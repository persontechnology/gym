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
        if (User::where('email', '=', 'spartansgym2020@gmail.com')->first() === null) {

	        User::create([
	            'name' => 'Admin',
	            'email' => 'spartansgym2020@gmail.com',
	            'password' => bcrypt('1708546161'),
	            'nombre'=>'ADMIN',
	            'apellido'=>'ADMIN',
	            'identificacion'=>'000000000',
                'perfil'=>'Administrador',
                'email_verified_at'=>Carbon::now()
	        ]);

        }
    }
}
