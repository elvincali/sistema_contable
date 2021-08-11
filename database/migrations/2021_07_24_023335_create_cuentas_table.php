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

        // Cuenta::create([
        //     'tipo_cuenta_id' => 1,
        //     'cliente_id' => 4,
        //     'num_cuenta' => 10001234155487956,
        //     'fecha_apertura' => '2021-03-09',
        //     'fecha_cierre' => null,
        //     'saldo' => 5000,
        // ]);
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
