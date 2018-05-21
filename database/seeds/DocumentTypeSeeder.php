<?php

use App\DocumentType;
use Illuminate\Database\Seeder;

class DocumentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DocumentType::create([
            'name' => 'Cédula de Ciudadanía'
        ]);

        DocumentType::create([
            'name' => 'Nit'
        ]);

        DocumentType::create([
            'name' => 'Cédula de Extranjería'
        ]);
    }
}
