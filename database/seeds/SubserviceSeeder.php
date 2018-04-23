<?php

use App\Subservice;
use Illuminate\Database\Seeder;

class SubserviceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Subservice::create([
            'name' => 'Preñez'
        ]);

        Subservice::create([
            'name' => 'Transporte'
        ]);

        Subservice::create([
            'name' => 'Congelación'
        ]);

        Subservice::create([
            'name' => 'Vitrificacións'
        ]);

        Subservice::create([
            'name' => 'Semen'
        ]);

        Subservice::create([
            'name' => 'Genética'
        ]);

        Subservice::create([
            'name' => 'Preñez'
        ]);

        Subservice::create([
            'name' => 'OPU'
        ]);

        Subservice::create([
            'name' => 'Embrión'
        ]);

        Subservice::create([
            'name' => 'TE'
        ]);

        Subservice::create([
            'name' => 'Materiales'
        ]);

        Subservice::create([
            'name' => 'Embrión Fresco'
        ]);

        Subservice::create([
            'name' => 'Embrión Congelado'
        ]);

        Subservice::create([
            'name' => 'Embrión Vitrificado'
        ]);

        Subservice::create([
            'name' => 'Selección'
        ]);

        Subservice::create([
            'name' => 'Sincronización'
        ]);

        Subservice::create([
            'name' => 'Dx. Gestación'
        ]);

        Subservice::create([
            'name' => 'Aspiración'
        ]);

        Subservice::create([
            'name' => 'TE Embriones'
        ]);

        Subservice::create([
            'name' => 'Sexaje Fetal'
        ]);

        Subservice::create([
            'name' => 'Evaluación Donadoras'
        ]);

        Subservice::create([
            'name' => 'Desvitrificación'
        ]);

        Subservice::create([
            'name' => 'Empaque Embriones'
        ]);

        Subservice::create([
            'name' => 'Otro'
        ]);
    }
}
