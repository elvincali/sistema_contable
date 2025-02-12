<?php

namespace App\Exceptions;

use App\Util\BaseResponse;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Facades\Log;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        if ($request->expectsJson()) {
            if ($exception instanceof QueryException) {
                $response = new BaseResponse();
                $response->errorResponse($exception->getCode(), "Error en Base de datos.");
                Log::error($exception->getMessage());
                return response()->json($response, 500);
            }
            if ($request instanceof Throwable) {
                $response = new BaseResponse();
                $code = ($exception->getCode() == 0) ? 500 : $exception->getCode();
                $response->errorResponse($code, $exception->getMessage());
                Log::error($exception->getMessage());
                return response()->json($response, 500);
            }
        }
        return parent::render($request, $exception);
    }
}
