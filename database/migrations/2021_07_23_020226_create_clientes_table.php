<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\User;
use App\Cliente;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('genero');
            $table->string('nacionalidad');
            $table->string('estado_civ');
            $table->string('ocupacion');
            $table->timestamps();
        });

        $user = User::create(['foto' => 'cliente1.jpg',
                    'ci' => 9787542,
                    'codigo' => 9752,
                    'nombre' => 'ALBERTO',
                    'apellido_pat' => 'RAMONES',
                    'apellido_mat' => 'CASTRO',
                    'fecha_nac' => '2021-09-01',
                    'telefono' => 5487987,
                    'direccion' => 'km 6, doble via a la Guardia',
                    'latitud' => '5487987sdd',
                    'longitud' => '5487987sdd',
                    'email' => 'user3@user.com',
                    'password' => Hash::make('0120'),
        ]);
        Cliente::create([
            'user_id' => 4,
            'genero' => 'masculino',
            'nacionalidad' => 'nacionalidad',
            'estado_civ' => 'casado',
            'ocupacion' => 'zapatero',
        ]);

        $user->assignRole('cliente');

        $user = User::create(['foto' => 'cliente3.jpg',
                    'ci' => 9787548,
                    'codigo' => 9722,
                    'nombre' => 'MARIA',
                    'apellido_pat' => 'BUSTAMANTE',
                    'apellido_mat' => 'ARIAS',
                    'fecha_nac' => '2021-09-08',
                    'telefono' => 79584879,
                    'direccion' => 'plan 3000, doble via a la Guardia',
                    'latitud' => '5487987sdd',
                    'longitud' => '5487987sdd',
                    'email' => 'user4@user.com',
                    'password' => Hash::make('0120'),
        ]);
        Cliente::create([
            'user_id' => 5,
            'genero' => 'femenino',
            'nacionalidad' => 'Boliviano',
            'estado_civ' => 'casada',
            'ocupacion' => 'Ama de casa',
        ]);

        $user->assignRole('cliente');

        $user = User::create(['foto' => 'cliente3.jpg',
                    'ci' => 9787512,
                    'codigo' => 9733,
                    'nombre' => 'CARMEN',
                    'apellido_pat' => 'RIOS',
                    'apellido_mat' => 'ROJAS',
                    'fecha_nac' => '2021-04-08',
                    'telefono' => 69854521,
                    'direccion' => 'Villa primero de mayo',
                    'latitud' => '5487787sdd',
                    'longitud' => '5487487sdd',
                    'email' => 'user5@user.com',
                    'password' => Hash::make('0120'),
        ]);
        Cliente::create([
            'user_id' => 6,
            'genero' => 'femenino',
            'nacionalidad' => 'Boliviano',
            'estado_civ' => 'soltera',
            'ocupacion' => 'Cocinera',
        ]);

        $user->assignRole('cliente');

        $user = User::create(['foto' => 'cliente4.jpg',
                    'ci' => 9787513,
                    'codigo' => 9755,
                    'nombre' => 'ROBERTO',
                    'apellido_pat' => 'APAZA',
                    'apellido_mat' => 'GONZALES',
                    'fecha_nac' => '2021-01-08',
                    'telefono' => 69854521,
                    'direccion' => 'Av. Las Americas',
                    'latitud' => '5487167sdd',
                    'longitud' => '5487787sdd',
                    'email' => 'user6@user.com',
                    'password' => Hash::make('0120'),
        ]);
        Cliente::create([
            'user_id' => 6,
            'genero' => 'masculino',
            'nacionalidad' => 'Boliviano',
            'estado_civ' => 'soltero',
            'ocupacion' => 'Banquero',
        ]);

        $user->assignRole('cliente');

        $user = User::create(['foto' => 'cliente5.jpg',
                    'ci' => 9787514,
                    'codigo' => 9766,
                    'nombre' => 'CELIA',
                    'apellido_pat' => 'BLANCO',
                    'apellido_mat' => 'RAMIREZ',
                    'fecha_nac' => '2021-08-14',
                    'telefono' => 69854781,
                    'direccion' => 'Urb. Las retamas',
                    'latitud' => '5487160sdd',
                    'longitud' => '5481787sdd',
                    'email' => 'user7@user.com',
                    'password' => Hash::make('0120'),
        ]);
        Cliente::create([
            'user_id' => 7,
            'genero' => 'femenino',
            'nacionalidad' => 'Boliviano',
            'estado_civ' => 'soltero',
            'ocupacion' => 'Secretaria',
        ]);

        $user->assignRole('cliente');

        $user = User::create(['foto' => 'cliente6.jpg',
                    'ci' => 9787515,
                    'codigo' => 9777,
                    'nombre' => 'CARLOS',
                    'apellido_pat' => 'FLORES',
                    'apellido_mat' => 'APAZA',
                    'fecha_nac' => '2021-01-10',
                    'telefono' => 69854429,
                    'direccion' => 'Urb. Satelite',
                    'latitud' => '5407160sdd',
                    'longitud' => '5481717sdd',
                    'email' => 'user8@user.com',
                    'password' => Hash::make('0120'),
        ]);
        Cliente::create([
            'user_id' => 8,
            'genero' => 'masculino',
            'nacionalidad' => 'Boliviano',
            'estado_civ' => 'casado',
            'ocupacion' => 'Ingeniero',
        ]);

        $user->assignRole('cliente');

        $user = User::create(['foto' => 'cliente7.jpg',
                    'ci' => 9787516,
                    'codigo' => 9788,
                    'nombre' => 'ROCIO',
                    'apellido_pat' => 'MORALES',
                    'apellido_mat' => 'CALLEJAS',
                    'fecha_nac' => '2021-09-01',
                    'telefono' => 69854409,
                    'direccion' => 'Av. Virgen de Cotoca',
                    'latitud' => '5307160sdd',
                    'longitud' => '5481711sdd',
                    'email' => 'user9@user.com',
                    'password' => Hash::make('0120'),
        ]);
        Cliente::create([
            'user_id' => 9,
            'genero' => 'femenino',
            'nacionalidad' => 'Boliviano',
            'estado_civ' => 'casado',
            'ocupacion' => 'Arquitecto',
        ]);

        $user->assignRole('cliente');

        $user = User::create(['foto' => 'cliente8.jpg',
                    'ci' => 9787516,
                    'codigo' => 9788,
                    'nombre' => 'ALBERTO',
                    'apellido_pat' => 'CUELLAR',
                    'apellido_mat' => 'ROCA',
                    'fecha_nac' => '2021-10-01',
                    'telefono' => 69454212,
                    'direccion' => 'Av. Roca y Coronado',
                    'latitud' => '5307161sdd',
                    'longitud' => '5421711sdd',
                    'email' => 'user10@user.com',
                    'password' => Hash::make('0120'),
        ]);
        Cliente::create([
            'user_id' => 10,
            'genero' => 'masculino',
            'nacionalidad' => 'Boliviano',
            'estado_civ' => 'soltero',
            'ocupacion' => 'Doctor',
        ]);

        $user->assignRole('cliente');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
}
