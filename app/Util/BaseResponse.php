<?php

namespace App\Util;

class BaseResponse
{
    public $error = 0;
    public $message = "";
    public $message_interno = "";
    public $status = ResponseStatus::OK;
    public $data = array();

    public function errorResponse($error, $messaje)
    {
        $this->error = $error;
        $this->status = ResponseStatus::NOT;
        $this->message = $messaje;
    }

}
