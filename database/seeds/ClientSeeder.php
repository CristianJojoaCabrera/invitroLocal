<?php

use Illuminate\Database\Seeder;
use App\Client;
use App\Local;
use App\ClientService;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $client = Client::create([
            'identification_type_id' => '1',
            'identification_number' => '123456789876',
            'bussiness_name' => 'Finca Llano Grande',
            'address' => 'Av. Circunvalar ',
            'phone' => '7770000',
            'cellphone' => '3138000000',
            'email' => 'admin@fincallano.com',
            'contact' => 'Maria J',
            'position' => '0',
            'quota' => '30000',
            'payment_deadline' => '30',
            'city' => 'Bogotá',
            'department' => 'Cundinamarca'
        ]);

        $local = Local::create([
            'client_id' => $client->id,
            'name' => ' Finca 1',
            'city' => 'Tunja',
            'department' => 'Boyaca',
            'phone' => '1234567',
            'email' => 'admin@fincallano.com',
            'contact' => 'Maria J'
        ]);

        $service = ClientService::create([
            'amount' => '200000',
            'client_id' => $client->id,
            'service_id' => '1'
        ]);
    }
}
