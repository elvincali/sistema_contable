<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Cuenta;

class CuentaGenerarInteres extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cuenta:generar_interes';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $cuentas = Cuenta::join('tipo_cuentas', 'tipo_cuenta_id', 'tipo_cuentas.id')
                            ->select('cuentas.id', 'tipo_cuentas.tasa_interes', 'cuentas.saldo')
                            ->get();
        foreach ($cuentas as $cuenta) {
            Cuenta::where('id', $cuenta->id)
                    ->update([
                        'saldo' => $cuenta->saldo + ( $cuenta->saldo * ($cuenta->tasa_interes / 100) ),
                        'retiros_mes' => 0
                    ]);
        }
    }
}
