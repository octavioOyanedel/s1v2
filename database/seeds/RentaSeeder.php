<?php

use Illuminate\Database\Seeder;

class RentaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Renta::create(['cantidad' => 2]);
    }
}
