<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\User;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('foto')->nullable();
            $table->integer('ci');
            $table->integer('codigo');
            $table->string('nombre');
            $table->string('apellido_pat')->nullable();
            $table->string('apellido_mat')->nullable();
            $table->date('fecha_nac');
            $table->integer('telefono');
            $table->string('direccion');
            $table->string('latitud')->nullable();
            $table->string('longitud')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->boolean('estado')->default(1);
            $table->rememberToken();
            $table->timestamps();
        });

        $user = User::create(['foto' => 'admin.jpg',
                    'ci' => 0000,
                    'codigo' => 0000,
                    'nombre' => 'ADMIN',
                    'apellido_pat' => null,
                    'apellido_mat' => null,
                    'fecha_nac' => '2021-09-01',
                    'telefono' => 5487987,
                    'direccion' => 'los lotes',
                    'latitud' => '5487987sdd',
                    'longitud' => '5487987sdd',
                    'email' => 'admin@admin.com',
                    'password' => Hash::make('0120'),
        ]);
        $user->assignRole('admin');
        $user = User::create(['foto' => 'funcionario1.jpg',
                    'ci' => 9795297,
                    'codigo' => 5297,
                    'nombre' => 'Roxana',
                    'apellido_pat' => 'Aramayo',
                    'apellido_mat' => 'Saldias',
                    'fecha_nac' => '2021-09-01',
                    'telefono' => 5487987,
                    'direccion' => 'los lotes, av Nuevo Palmar',
                    'latitud' => '5487987sdd',
                    'longitud' => '5487987sdd',
                    'email' => 'user1@user.com',
                    'password' => Hash::make('0120'),
        ]);
        $user->assignRole('funcionario');
        $user = User::create(['foto' => 'funcionario2.jpg',
                    'ci' => 959784,
                    'codigo' => 9698,
                    'nombre' => 'Damian',
                    'apellido_pat' => 'Cortez',
                    'apellido_mat' => 'Mariscal',
                    'fecha_nac' => '2021-09-01',
                    'telefono' => 5487987,
                    'direccion' => 'Plan 3000, av Paurito',
                    'latitud' => '5487987sdd',
                    'longitud' => '5487987sdd',
                    'email' => 'user2@user.com',
                    'password' => Hash::make('0120'),
        ]);
        $user->assignRole('funcionario');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
