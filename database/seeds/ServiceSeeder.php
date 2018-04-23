<?php

use App\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Service::create([
            'name' => 'Preñez',
            'amount' => 0
        ]);

        Service::create([
            'name' => 'Embrión Fresco',
            'amount' => 0
        ]);

        Service::create([
            'name' => 'Embrión Congelado',
            'amount' => 0
        ]);

        Service::create([
            'name' => 'Embrión Vitrificado',
            'amount' => 0
        ]);

        Service::create([
            'name' => 'Servicio Técnico',
            'amount' => 0
        ]);
    }
}
