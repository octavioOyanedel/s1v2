<?php

use Illuminate\Database\Seeder;

class CuentaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Cuenta::create(['numero' => '24700081903', 'tipo' =>  'Cuenta Corriente', 'banco' =>  'Banco Estado']);
        App\Cuenta::create(['numero' => '614088208', 'tipo' =>  'Cuenta Corriente', 'banco' =>  'Scotiabank']);
    }
}
