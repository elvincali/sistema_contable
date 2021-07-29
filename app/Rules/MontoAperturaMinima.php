<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\TipoCuenta;

class MontoAperturaMinima implements Rule
{
    private $tipo_cuenta_id;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($tipo_cuenta_id)
    {
        $this->tipo_cuenta_id = $tipo_cuenta_id;
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
        $tipo_cuenta = TipoCuenta::find($this->tipo_cuenta_id);
        return $tipo_cuenta->apertura_minima < $value;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'El monto a depositar es menor al monto minimo de apertura!!!';
    }
}
