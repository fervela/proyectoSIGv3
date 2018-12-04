<?php

use Illuminate\Database\Seeder;
use App\User;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {	
    	User::create([
    		'name'=> 'Luis Yerko',
    		'email' => 'luis@gmail.com',
    		'password' => 123456,
    		'tipo' => 'A',
    		'tokenfirebase' => null,
    		'fechanacimiento' => '10/19/2018',
    		'sexo' => 'M',
    		'direccion' => 'Calle 13',
    		'telefono' => 69131148,
    		'imei' => null,
    		'nlicencia' => null,
    		'categoria' => 'A',
    		'fechavencimiento' => '15/11/2018',
    		'foto' => 'luis.jpg'
		]);

		User::create([
    		'name'=> 'Alex',
    		'email' => 'alex@gmail.com',
    		'password' => 123456,
    		'tipo' => 'P',
    		'tokenfirebase' => null,
    		'fechanacimiento' => '10/19/2018',
    		'sexo' => 'M',
    		'direccion' => 'Calle 13',
    		'telefono' => 69131148,
    		'imei' => null,
    		'nlicencia' => null,
    		'categoria' => 'A',
    		'fechavencimiento' => '15/11/2018',
    		'foto' => 'luis.jpg'
		]);

		User::create([
    		'name'=> 'La jefa',
    		'email' => 'lajefa@gmail.com',
    		'password' => 123456,
    		'tipo' => 'C',
    		'tokenfirebase' => null,
    		'fechanacimiento' => '10/19/2018',
    		'sexo' => 'f',
    		'direccion' => 'Calle 13',
    		'telefono' => 69131148,
    		'imei' => null,
    		'nlicencia' => null,
    		'categoria' => 'A',
    		'fechavencimiento' => '15/11/2018',
    		'foto' => 'luis.jpg'
		]);
    }
}
