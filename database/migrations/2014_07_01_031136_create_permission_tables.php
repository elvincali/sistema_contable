<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreatePermissionTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $tableNames = config('permission.table_names');
        $columnNames = config('permission.column_names');

        if (empty($tableNames)) {
            throw new \Exception('Error: config/permission.php not loaded. Run [php artisan config:clear] and try again.');
        }

        Schema::create($tableNames['permissions'], function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');       // For MySQL 8.0 use string('name', 125);
            $table->string('guard_name'); // For MySQL 8.0 use string('guard_name', 125);
            $table->timestamps();

            $table->unique(['name', 'guard_name']);
        });

        Schema::create($tableNames['roles'], function (Blueprint $table) {
            $table->id();
            $table->string('name');       // For MySQL 8.0 use string('name', 125);
            $table->string('guard_name'); // For MySQL 8.0 use string('guard_name', 125);
            $table->timestamps();

            $table->unique(['name', 'guard_name']);
        });

        Schema::create($tableNames['model_has_permissions'], function (Blueprint $table) use ($tableNames, $columnNames) {
            $table->unsignedBigInteger('permission_id');

            $table->string('model_type');
            $table->unsignedBigInteger($columnNames['model_morph_key']);
            $table->index([$columnNames['model_morph_key'], 'model_type'], 'model_has_permissions_model_id_model_type_index');

            $table->foreign('permission_id')
                ->references('id')
                ->on($tableNames['permissions'])
                ->onDelete('cascade');

            $table->primary(['permission_id', $columnNames['model_morph_key'], 'model_type'],
                    'model_has_permissions_permission_model_type_primary');
        });

        Schema::create($tableNames['model_has_roles'], function (Blueprint $table) use ($tableNames, $columnNames) {
            $table->unsignedBigInteger('role_id');

            $table->string('model_type');
            $table->unsignedBigInteger($columnNames['model_morph_key']);
            $table->index([$columnNames['model_morph_key'], 'model_type'], 'model_has_roles_model_id_model_type_index');

            $table->foreign('role_id')
                ->references('id')
                ->on($tableNames['roles'])
                ->onDelete('cascade');

            $table->primary(['role_id', $columnNames['model_morph_key'], 'model_type'],
                    'model_has_roles_role_model_type_primary');
        });

        Schema::create($tableNames['role_has_permissions'], function (Blueprint $table) use ($tableNames) {
            $table->unsignedBigInteger('permission_id');
            $table->unsignedBigInteger('role_id');

            $table->foreign('permission_id')
                ->references('id')
                ->on($tableNames['permissions'])
                ->onDelete('cascade');

            $table->foreign('role_id')
                ->references('id')
                ->on($tableNames['roles'])
                ->onDelete('cascade');

            $table->primary(['permission_id', 'role_id'], 'role_has_permissions_permission_id_role_id_primary');
        });

        app('cache')
            ->store(config('permission.cache.store') != 'default' ? config('permission.cache.store') : null)
            ->forget(config('permission.cache.key'));

        $role = Role::create(['name' => 'admin']);
        $role2 = Role::create(['name' => 'funcionario']);
        $role3 = Role::create(['name' => 'cliente']);
        Permission::create(['name' => 'ver dashboard']);    

        Permission::create(['name' => 'ver sucursal'])->assignRole($role);    
        Permission::create(['name' => 'crear sucursal'])->assignRole($role);    
        Permission::create(['name' => 'editar sucursal'])->assignRole($role);    
        Permission::create(['name' => 'mostrar sucursal'])->assignRole($role);    
        Permission::create(['name' => 'desactivar sucursal'])->assignRole($role);

        Permission::create(['name' => 'ver moneda'])->assignRole($role);    
        Permission::create(['name' => 'crear moneda'])->assignRole($role);    
        Permission::create(['name' => 'editar moneda'])->assignRole($role);    
        Permission::create(['name' => 'mostrar moneda'])->assignRole($role);    
        Permission::create(['name' => 'desactivar moneda'])->assignRole($role);

        Permission::create(['name' => 'ver usuario'])->assignRole($role);    
        Permission::create(['name' => 'crear usuario'])->assignRole($role);    
        Permission::create(['name' => 'editar usuario'])->assignRole($role);    
        Permission::create(['name' => 'mostrar usuario'])->assignRole($role);    
        Permission::create(['name' => 'desactivar usuario'])->assignRole($role); 
        
        Permission::create(['name' => 'ver permiso'])->assignRole($role);    
        Permission::create(['name' => 'crear permiso'])->assignRole($role);    
        Permission::create(['name' => 'editar permiso'])->assignRole($role);    
        Permission::create(['name' => 'mostrar permiso'])->assignRole($role);    
        Permission::create(['name' => 'desactivar permiso'])->assignRole($role); 
        
        Permission::create(['name' => 'ver rol'])->assignRole($role);    
        Permission::create(['name' => 'crear rol'])->assignRole($role);    
        Permission::create(['name' => 'editar rol'])->assignRole($role);    
        Permission::create(['name' => 'mostrar rol'])->assignRole($role);    
        Permission::create(['name' => 'desactivar rol'])->assignRole($role); 
        
        Permission::create(['name' => 'ver tipo cuenta'])->assignRole($role);    
        Permission::create(['name' => 'crear tipo cuenta'])->assignRole($role);    
        Permission::create(['name' => 'editar tipo cuenta'])->assignRole($role);    
        Permission::create(['name' => 'mostrar tipo cuenta'])->assignRole($role);    
        Permission::create(['name' => 'desactivar tipo cuenta'])->assignRole($role); 

        Permission::create(['name' => 'ver cuenta'])->assignRole($role);    
        Permission::create(['name' => 'crear cuenta'])->assignRole($role);    
        Permission::create(['name' => 'editar cuenta'])->assignRole($role);    
        Permission::create(['name' => 'mostrar cuenta'])->assignRole($role);    
        Permission::create(['name' => 'desactivar cuenta'])->assignRole($role);

        Permission::create(['name' => 'ver cliente'])->assignRole($role);    
        Permission::create(['name' => 'crear cliente'])->assignRole($role);    
        Permission::create(['name' => 'editar cliente'])->assignRole($role);    
        Permission::create(['name' => 'mostrar cliente'])->assignRole($role);    
        Permission::create(['name' => 'desactivar cliente'])->assignRole($role);

        Permission::create(['name' => 'ver transaccion'])->assignRole($role);    
        Permission::create(['name' => 'crear transaccion'])->assignRole($role);    
        Permission::create(['name' => 'editar transaccion'])->assignRole($role);    
        Permission::create(['name' => 'mostrar transaccion'])->assignRole($role);    
        Permission::create(['name' => 'desactivar transaccion'])->assignRole($role);
        
        Permission::create(['name' => 'ver deposito'])->assignRole($role);    
        Permission::create(['name' => 'crear deposito'])->assignRole($role);    
        Permission::create(['name' => 'editar deposito'])->assignRole($role);    
        Permission::create(['name' => 'mostrar deposito'])->assignRole($role);    
        Permission::create(['name' => 'desactivar deposito'])->assignRole($role);
        
        Permission::create(['name' => 'ver retiro'])->assignRole($role);    
        Permission::create(['name' => 'crear retiro'])->assignRole($role);    
        Permission::create(['name' => 'editar retiro'])->assignRole($role);    
        Permission::create(['name' => 'mostrar retiro'])->assignRole($role);    
        Permission::create(['name' => 'desactivar retiro'])->assignRole($role);
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $tableNames = config('permission.table_names');

        if (empty($tableNames)) {
            throw new \Exception('Error: config/permission.php not found and defaults could not be merged. Please publish the package configuration before proceeding, or drop the tables manually.');
        }

        Schema::drop($tableNames['role_has_permissions']);
        Schema::drop($tableNames['model_has_roles']);
        Schema::drop($tableNames['model_has_permissions']);
        Schema::drop($tableNames['roles']);
        Schema::drop($tableNames['permissions']);
    }
}
