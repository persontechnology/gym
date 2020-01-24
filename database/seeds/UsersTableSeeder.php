<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use gym\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (User::where('email', '=', 'admin@admin.com')->first() === null) {

	        User::create([
	            'name' => 'Admin',
	            'email' => 'admin@admin.com',
	            'password' => bcrypt('password'),
	            'nombre'=>'ADMIN',
	            'apellido'=>'ADMIN',
	            'identificacion'=>'000000000',
                'perfil'=>'Administrador',
                'email_verified_at'=>Carbon::now()
	        ]);

        }
    }
}
