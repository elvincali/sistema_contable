<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

use App\Cuenta;
use App\TipoCuenta;

class RetirosPermitidos implements Rule
{
    private $tipo;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($tipo)
    {
        $this->tipo = $tipo;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if ($this->tipo == 'Retiro') {
            $cuenta = Cuenta::where('num_cuenta', $value)->first();
            $retiros_permitidos = TipoCuenta::where('id', $cuenta->tipo_cuenta_id)->first()->retiros_mes;
            if($retiros_permitidos != 0)
                return $retiros_permitidos > $cuenta->retiros_mes ? true : false;
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Esta cuenta a excedido la cantidad de Retiros este mes';
    }
}
