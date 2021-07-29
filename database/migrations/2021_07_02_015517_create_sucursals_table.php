<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSucursalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sucursals', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 50)->unique();
            $table->string('imagen');
            $table->time('inicio_atencion'); // Inicio de Atencion
            $table->time('fin_atencion'); //  Fin de Atención
            $table->integer('codigo');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('direccion', 255);
            $table->string('sitio', 255);
            $table->timestamps();
        });

        DB::table('sucursals')->insert([
            [
              'nombre' => 'Sucursal 1',
              'imagen' => '1.jpg',
              'inicio_atencion' => '08:00',
              'fin_atencion' => '16:00',
              'latitude' => '-17.793935176396246',
              'longitude' => '-63.17243244926048',
              'direccion' => 'Calle 8 Este, Santa Cruz de la Sierra',
              'codigo' => 1234,
              'sitio' => 'UV-5',
            ],
            [
              'nombre' => 'Sucursal 2',
              'imagen' => '2.jpg',
              'inicio_atencion' => '08:00',
              'fin_atencion' => '16:00',
              'latitude' => '-17.771588685678825',
              'longitude' => '-63.16406116574146',
              'codigo' => 0235,
              'direccion' => 'Av. Cañada Pailita o Avenida Paurito, Santa Cruz de la Sierra',
              'sitio' => 'UV-18',
            ],
            [
              'nombre' => 'Sucursal 3',
              'imagen' => '3.jpg',
              'inicio_atencion' => '08:00',
              'fin_atencion' => '16:00',
              'latitude' => '-17.761588685678825',
              'longitude' => '-63.15406116574146',
              'codigo' => 4565,
              'direccion' => 'Cuellar, Santa Cruz de la Sierra',
              'sitio' => 'UV-18',
            ],
            [
              'nombre' => 'Sucursal 4',
              'imagen' => '4.jpg',
              'inicio_atencion' => '08:00',
              'fin_atencion' => '16:00',
              'latitude' => '-17.761588685678825',
              'longitude' => '-63.15406116574146',
              'codigo' => 4560,
              'direccion' => 'Av. Irala esquina, Santa Cruz de la Sierra',
              'sitio' => 'UV-18',
            ],
          ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sucursals');
    }
}
