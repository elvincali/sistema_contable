<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

use App\Cuenta;
use App\TipoCuenta;

class MontoPermitido implements Rule
{

    private $cuenta;
    private $monto_permitido;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($cuenta)
    {
        $this->cuenta = $cuenta;
        $this->monto_permitido = Cuenta::join('tipo_cuentas', 'tipo_cuenta_id', 'tipo_cuentas.id')
                                        ->where('num_cuenta', $cuenta)
                                        ->first()
                                        ->apertura_minima;
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
        $saldo = Cuenta::where('num_cuenta', $this->cuenta)->first()->saldo;
        $saldo_despues = $saldo - $value;
        return $saldo_despues > $this->monto_permitido;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'La cuenta debe contar con al menos ' . $this->monto_permitido . ' Bs';
    }
}
