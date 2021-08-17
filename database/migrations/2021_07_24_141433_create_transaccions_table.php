<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use Carbon\Carbon;

use App\Transaccion;

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

        Transaccion::create([
            'monto' => 1200,
            'fecha' => '2021-06-12',
            'hora' => Carbon::now()->toTimeString(),
            'ci_cliente' => 8754878,
            'nombre_cliente' => 'RAFAEL GARCIA ARIAS',
            'tipo' => 'DEPOSITO',
            'cod_funcionario' => 1234,
            'descripcion' => 'Deposito en caja de ahorro',
            'num_cuenta_id' => 2
        ]);
        Transaccion::create([
            'monto' => 110,
            'fecha' => '2021-06-15',
            'hora' => Carbon::now()->toTimeString(),
            'ci_cliente' => 87548681,
            'nombre_cliente' => 'ROBERTO APAZA GONZALES',
            'tipo' => 'DEPOSITO',
            'cod_funcionario' => 1234,
            'descripcion' => 'Deposito en caja de ahorro',
            'num_cuenta_id' => 4
        ]);
        Transaccion::create([
            'monto' => 1100,
            'fecha' => '2021-06-10',
            'hora' => Carbon::now()->toTimeString(),
            'ci_cliente' => 8754868,
            'nombre_cliente' => 'CARMEN RIOS ROJAS',
            'tipo' => 'DEPOSITO',
            'cod_funcionario' => 1234,
            'descripcion' => 'Deposito en caja de ahorro',
            'num_cuenta_id' => 3
        ]);
        Transaccion::create([
            'monto' => 100,
            'fecha' => '2021-06-20',
            'hora' => Carbon::now()->toTimeString(),
            'ci_cliente' => 8754868,
            'nombre_cliente' => 'CARMEN RIOS ROJAS',
            'tipo' => 'DEPOSITO',
            'cod_funcionario' => 1234,
            'descripcion' => 'Deposito en caja de ahorro',
            'num_cuenta_id' => 5
        ]);
        Transaccion::create([
            'monto' => 1200,
            'fecha' => '2021-06-12',
            'hora' => Carbon::now()->toTimeString(),
            'ci_cliente' => 8754878,
            'nombre_cliente' => 'RAFAEL GARCIA ARIAS',
            'tipo' => 'RETIRO',
            'cod_funcionario' => 1234,
            'descripcion' => 'Retiro en caja de ahorro',
            'num_cuenta_id' => 2
        ]);
        Transaccion::create([
            'monto' => 110,
            'fecha' => '2021-06-15',
            'hora' => Carbon::now()->toTimeString(),
            'ci_cliente' => 87548681,
            'nombre_cliente' => 'ROBERTO APAZA GONZALES',
            'tipo' => 'RETIRO',
            'cod_funcionario' => 1234,
            'descripcion' => 'Retiro en caja de ahorro',
            'num_cuenta_id' => 4
        ]);
        Transaccion::create([
            'monto' => 1100,
            'fecha' => '2021-06-10',
            'hora' => Carbon::now()->toTimeString(),
            'ci_cliente' => 8754868,
            'nombre_cliente' => 'CARMEN RIOS ROJAS',
            'tipo' => 'RETIRO',
            'cod_funcionario' => 1234,
            'descripcion' => 'Retiro en caja de ahorro',
            'num_cuenta_id' => 3
        ]);
        Transaccion::create([
            'monto' => 100,
            'fecha' => '2021-06-20',
            'hora' => Carbon::now()->toTimeString(),
            'ci_cliente' => 8754868,
            'nombre_cliente' => 'CARMEN RIOS ROJAS',
            'tipo' => 'RETIRO',
            'cod_funcionario' => 1234,
            'descripcion' => 'Retiro en caja de ahorro',
            'num_cuenta_id' => 5
        ]);
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
