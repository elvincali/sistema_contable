<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

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

Route::get('/salir', 'Auth\LoginController@logout')->name('salir');

Route::resource('/administracion/monedas', 'MonedaController');
Route::resource('/administracion/sucursales', 'SucursalController');
Route::resource('/administracion/tipo-cuentas', 'TipoCuentaController');
Route::get('/usuario/permisos', 'RoleController@permisos')->name('permisos');
Route::resource('/usuario/roles', 'RoleController');
Route::resource('/usuario/funcionarios', 'UserController');
Route::resource('/cliente/clientes', 'ClienteController');
Route::resource('/cliente/cuentas', 'CuentaController');
Route::resource('transaccion/depositos', 'DepositoController');
Route::resource('transaccion/retiros', 'RetiroController');
Route::resource('transaccion/transacciones', 'TransaccionController');

Route::get('/backups', 'BackupController@index')->name('database.index');
Route::get('/database/backups', 'BackupController@backup')->name('database.backup');
Route::get('database/restore/{name_database}', 'BackupController@restore')->name('database.restore');
Route::get('database/delete/{name_database}', 'BackupController@delete')->name('database.delete');
Route::get('database/download/{name_database}', 'BackupController@download')->name('database.download');

Route::get('bitacora', 'HomeController@bitacora')->name('bitacora');
Route::get('reportes', 'HomeController@reporte')->name('reporte');
Route::post('reportes', 'HomeController@reporteBuscar')->name('reporte');

Route::get('/prueba', function(){
    return view('pdf.recibo');
});

Route::get('storage-link', function () {
    Artisan::call('storage:link');
    return back();
});

Route::get('database-migration', function () {
    Artisan::call('migrate:fresh');
    Auth::logout();
    return redirect()->route('login');
});

Route::get('database-pgsql-backup', function () {
    Artisan::call('schedule:run');
    Auth::logout();
    return redirect()->route('login');
});
