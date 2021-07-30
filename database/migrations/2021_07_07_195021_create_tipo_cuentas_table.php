<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\TipoCuenta;

class CreateTipoCuentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_cuentas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('imagen');
            $table->string('descripcion');
            $table->text('caracteristicas');
            $table->text('ventajas');
            $table->double('tasa_interes');
            $table->double('apertura_minima');
            $table->integer('retiros_mes')->default(0);
            $table->boolean('estado')->default(1);
            $table->foreignId('moneda_id')->constrained('monedas');
            $table->timestamps();
        });

        TipoCuenta::create([
            'nombre' => 'CAJA DE AHORROS',
            'imagen' => 'caja-de-ahorros.JPG',
            'descripcion' => 'Es un producto de ahorro, que permite al cliente realizar depósitos y retiros de forma ilimitada, los fondos depositados son de disponibilidad inmediata y generan intereses que son capitalizados mensualmente',
            'caracteristicas' => 'Disponible para Personas Naturales y Jurídicas.
            Sin límite de retiros o depósitos a través de cajas.
            Sin costo de mantenimiento de cuenta o tarjeta de débito.
            Disponible en bolivianos y dólares.
            Puedes abrir tu cuenta de manera individual o colectiva con orden de manejo conjunto o indistinto',
            'ventajas' => 'Tarjeta de Débito, con la que puedes hacer compras por internet y POS.
            Acceso a la red más grande del País con más de 190 agencias y más de 440 cajeros automáticos.
            Manejo de la cuenta y acceso a información de los movimientos a nivel nacional.
            Contamos con puntos de atención desde las 7 a.m. y nuestras agencias 7 días.
            Acceso a los servicios de Banca Electrónica UNInet plus y UNImóvil plus las 24 horas del día.
            Consulta tu saldo y movimientos fácil y sin costo través de nuestra Banca Electrónica UNInet plus, UNImóvil plus y Cajeros Automático.
            Atención sin hacer filas a través del servicio UNIticket',
            'tasa_interes' => '2',
            'apertura_minima' => '0',
            'moneda_id' => 1,
        ]);

        TipoCuenta::create([
            'nombre' => 'CAJAS DE AHORRO UNIPLUS',
            'imagen' => 'Uniplus.JPG',
            'descripcion' => 'Nuestra cuenta UNIPLUS, es la caja de ahorro que otorga el más alto rendimiento para tus ahorros.',
            'caracteristicas' => 'Disponible para Personas Naturales.
            Máximo de 4 retiros al mes por cualquier canal
            Disponible en bolivianos y dólares.
            Puedes abrir tu cuenta de manera individual o colectiva con orden de manejo conjunto o indistinto.
            Sin costo de mantenimiento de cuenta o tarjeta de débito',
            'ventajas' => 'Tarjeta de Débito, con la que puedes hacer compras por internet y POS.
            Acceso a la red más grande del País con más de 190 agencias y más de 440 cajeros automáticos.
            Contamos con puntos de atención desde las 7 am y nuestras agencias 7 días.
            Acceso a los servicios de Banca Electrónica UNInet plus y UNImóvil plus.
            Consulta tu saldo y movimientos fácil y sin costo a través de nuestra Banca Electrónica UNInet plus, UNImóvil plus y Cajeros Automáticos.
            Atención sin hacer filas a través del servicio UNIticket',
            'retiros_mes' => 4,
            'tasa_interes' => '3.75',
            'apertura_minima' => '5000',
            'moneda_id' => 1,
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipo_cuentas');
    }
}
