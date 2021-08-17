<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Cuenta;

class CreateCuentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuentas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tipo_cuenta_id');
            $table->unsignedBigInteger('cliente_id');
            $table->unsignedBigInteger('num_cuenta');
            $table->date('fecha_apertura');
            $table->date('fecha_cierre')->nullable();
            $table->double('saldo', 8,2);
            $table->integer('retiros_mes')->default(0);
            $table->boolean('estado')->default(1);

            $table->foreign('tipo_cuenta_id')->references('id')->on('tipo_cuentas')->constrained();
            $table->foreign('cliente_id')->references('id')->on('users')->constrained();
            $table->timestamps();
        });

        Cuenta::create([
            'tipo_cuenta_id' => 1,
            'cliente_id' => 4,
            'num_cuenta' => 10001234155487943,
            'fecha_apertura' => '2020-03-09',
            'fecha_cierre' => null,
            'saldo' => 5000,
        ]);
        Cuenta::create([
            'tipo_cuenta_id' => 1,
            'cliente_id' => 4,
            'num_cuenta' => 10001234155487956,
            'fecha_apertura' => '2021-03-09',
            'fecha_cierre' => null,
            'saldo' => 5000,
        ]);
        Cuenta::create([
            'tipo_cuenta_id' => 1,
            'cliente_id' => 5,
            'num_cuenta' => 10001234155267956,
            'fecha_apertura' => '2021-04-09',
            'fecha_cierre' => null,
            'saldo' => 5000,
        ]);
        Cuenta::create([
            'tipo_cuenta_id' => 2,
            'cliente_id' => 5,
            'num_cuenta' => 10001234265487956,
            'fecha_apertura' => '2021-06-09',
            'fecha_cierre' => null,
            'saldo' => 5000,
        ]);
        Cuenta::create([
            'tipo_cuenta_id' => 1,
            'cliente_id' => 6,
            'num_cuenta' => 10001234155486556,
            'fecha_apertura' => '2021-09-09',
            'fecha_cierre' => null,
            'saldo' => 5000,
        ]);
        Cuenta::create([
            'tipo_cuenta_id' => 1,
            'cliente_id' => 6,
            'num_cuenta' => 10001234155537956,
            'fecha_apertura' => '2021-10-09',
            'fecha_cierre' => null,
            'saldo' => 5000,
        ]);
        Cuenta::create([
            'tipo_cuenta_id' => 1,
            'cliente_id' => 7,
            'num_cuenta' => 10001234195487956,
            'fecha_apertura' => '2020-03-09',
            'fecha_cierre' => null,
            'saldo' => 5000,
        ]);
        Cuenta::create([
            'tipo_cuenta_id' => 1,
            'cliente_id' => 8,
            'num_cuenta' => 10001234155467956,
            'fecha_apertura' => '2021-11-09',
            'fecha_cierre' => null,
            'saldo' => 5000,
        ]);
        Cuenta::create([
            'tipo_cuenta_id' => 1,
            'cliente_id' => 9,
            'num_cuenta' => 10001234155697956,
            'fecha_apertura' => '2021-05-09',
            'fecha_cierre' => null,
            'saldo' => 5000,
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cuentas');
    }
}
