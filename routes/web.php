<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');;
});

Auth::routes();


Route::get('/inicio', 'HomeController@index')->name('inicio');
Route::get('/admin', 'HomeController@index')->name('admin');
Route::get('/permisos', 'RoleController@permisos')->name('permisos');

Route::get('/salir', 'Auth\LoginController@logout')->name('salir');

Route::resource('/sucursales', 'SucursalController');
Route::resource('/roles', 'RoleController');
Route::resource('/funcionarios', 'UserController');
Route::resource('/monedas', 'MonedaController');
Route::resource('/tipo-cuentas', 'TipoCuentaController');
Route::resource('/clientes', 'ClienteController');
Route::resource('/cuentas', 'CuentaController');
Route::resource('/depositos', 'DepositoController');
Route::resource('/retiros', 'RetiroController');
Route::resource('/transacciones', 'TransaccionController');

Route::get('/backups', 'BackupController@index')->name('database.index');
Route::get('/database/backups', 'BackupController@backup')->name('database.backup');
Route::get('database/restore/{name_database}', 'BackupController@restore')->name('database.restore');
Route::get('database/delete/{name_database}', 'BackupController@delete')->name('database.delete');
Route::get('database/download/{name_database}', 'BackupController@download')->name('database.download');

Route::get('bitacora', 'HomeController@bitacora')->name('bitacora');

Route::get('/prueba', function(){
    return view('welcome');
});
