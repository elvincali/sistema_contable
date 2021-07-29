<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Moneda;

class CreateMonedasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monedas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('abreviacion');
            $table->timestamps();
        });

        Moneda::create(['nombre' => 'Boliviano',
                    'abreviacion' => 'BOB',
        ]);
        Moneda::create(['nombre' => 'Dolar',
                    'abreviacion' => 'DOL',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('monedas');
    }
}
