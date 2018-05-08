<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Felipe Arciniegas',
            'email' => 'mfelipeaq@gmail.com',
            'password' => bcrypt('mfelipeaq')
        ]);

        User::create([
            'name' => 'Jordy Chimbi',
            'email' => 'jordychimbi@gmail.com',
            'password' => bcrypt('jordychimbi')
        ]);

        User::create([
            'name' => 'Jairo Contreras',
            'email' => 'jcontreras@gmail.com',
            'password' => bcrypt('jcontreras')
        ]);

        User::create([
            'name' => 'Andrea Cely',
            'email' => 'carolca26@gmail.com',
            'password' => bcrypt('carolca26')
        ]);
    }
}
