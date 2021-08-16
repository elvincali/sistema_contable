<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaccionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaccions', function (Blueprint $table) {
            $table->id();
            $table->double('monto', 10,2);
            $table->date('fecha');
            $table->time('hora');
            $table->integer('ci_cliente');
            $table->string('nombre_cliente');
            $table->enum('tipo', ['DEPOSITO', 'RETIRO', 'TRANSACCION']);
            $table->integer('cod_funcionario')->nullable();
            $table->string('descripcion')->nullable();
            $table->integer('num_cuenta_destino')->nullable();
            $table->unsignedBigInteger('num_cuenta_id');

            $table->foreign('num_cuenta_id')->references('id')->on('cuentas')->constrained();
            $table->timestamps();
        });

        // Transaccion::create([
        //     'monto' => 1200,
        //     'fecha' => 2021
        // ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaccions');
    }
}
