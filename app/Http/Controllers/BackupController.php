<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Backup;
use App\Console\Command;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Storage;

class BackupController extends Controller
{
    public function index(){
        $backups = Storage::files('backup');
        return view('backup.index', compact('backups'));
    }

    public function backup(){
        $name_database = "backup-" . Carbon::now()->toDateString() . ".sql";
        
        $command = "mysqldump --user=" . env('DB_USERNAME') ." --password=" . env('DB_PASSWORD') . " --host=" . env('DB_HOST') . " " . env('DB_DATABASE') . "  > " . storage_path() . "/app/backup/" . $name_database;
        
        $returnVar = NULL;
        $output  = NULL;
        
        exec($command, $output, $returnVar);


        return redirect('backups')->with(['message' => 'se ha creado el backup exitosamente']);
    } 

    public function restore($name_database){
        $command = "mysql --user=" . env('DB_USERNAME') ." --password=" . env('DB_PASSWORD') . " --host=" . env('DB_HOST') . " " . env('DB_DATABASE') . "  < " . storage_path() . "/app/backup/" . $name_database;
    
        $returnVar = NULL;
        $output  = NULL;
    
        exec($command, $output, $returnVar);

        return redirect('backups')->with(['message' => 'se ha restaurado la base de dato: '.$name_database]);
    } 

    public function delete($name_database){
        Storage::delete('backup/'.$name_database);

        return redirect('backups')->with(['message' => 'se ha eliminado la base de dato: '.$name_database]);
    }

    public function download($name_database){
        return Storage::download('backup/'.$name_database);
    }
}
