<?php

namespace App\Http\Controllers\Api;

use App\Cliente;
use App\Http\Controllers\Controller;
use App\Util\BaseResponse;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

final class AuthController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     * @throws \Exception
     */
    public function login(Request $request)
    {
        $response = new BaseResponse();

        $email = $request->get('email');
        $password = $request->get('password');
        if (!Auth::attempt(['email' => $email, 'password' => $password])) {
            throw new \Exception('Credenciales invalidas!.');
        }
        $user = $request->user();

        if (!Cliente::query()->where('user_id', $user->id)->first()) {
            throw new \Exception('Solo disponible para clientes!.');
        }

        $tokenResult = $user->createToken('Password Grant Token');
        $token = $tokenResult->token;
        $token->expires_at = Carbon::now('America/La_Paz')->addYear();
        $token->save();

        $response->data = [
            'user' => $user,
            'token' => $tokenResult->accessToken,
        ];

        return new JsonResponse($response);
    }
}
