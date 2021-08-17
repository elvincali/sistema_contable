<?php

namespace App\Http\Controllers\Api;

use App\Cuenta;
use App\Http\Controllers\Controller;
use App\Util\BaseResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

final class AccountController extends Controller
{
    public function getInfoFromAccountNumber(Request $request, $accountNumber)
    {
        $response = new BaseResponse();

        $account = Cuenta::query()
            ->join('users', 'cliente_id', 'users.id')
            ->where('num_cuenta', $accountNumber)
            ->select('cuentas.id', 'num_cuenta', 'ci', 'tipo_cuenta_id', 'retiros_mes',
                DB::raw("CONCAT(nombre, ' ', apellido_pat, ' ', apellido_mat) as nombre"))
            ->first();

        $response->data = [
            'account' => $account,
        ];

        return new JsonResponse($response);
    }
}
