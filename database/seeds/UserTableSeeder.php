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
    		'password' => bcrypt('123456'),
    		'tipo' => 'A',
            'ci' => "6442345",
    		'tokenfirebase' => null,
    		'fechanacimiento' => '2018-12-11',
    		'sexo' => 'M',
    		'direccion' => 'Calle 13',
    		'telefono' => 69131148,
    		'imei' => null,
    		'nlicencia' => null,
    		'categoria' => 'A',
    		'fechavencimiento' => '2018-12-11',
    		'foto' => 'luis.jpg',
            'condicion' => null
		]);

		User::create([
    		'name'=> 'Alex',
    		'email' => 'alex@gmail.com',
    		'password' => bcrypt('123456'),
    		'tipo' => 'P',
            'ci' => "8864822",
    		'tokenfirebase' => null,
    		'fechanacimiento' => '2018-12-11',
    		'sexo' => 'M',
    		'direccion' => 'Calle 13',
    		'telefono' => 69131148,
    		'imei' => null,
    		'nlicencia' => null,
    		'categoria' => 'A',
    		'fechavencimiento' => '2018-12-11',
    		'foto' => 'luis.jpg',
            'condicion' => null
		]);

		User::create([
    		'name'=> 'La jefa',
    		'email' => 'lajefa@gmail.com',
    		'password' => bcrypt('123456'),
    		'tipo' => 'C',
            'ci' => "948234",
    		'tokenfirebase' => null,
    		'fechanacimiento' => '2018-12-11',
    		'sexo' => 'f',
    		'direccion' => 'Calle 13',
    		'telefono' => 69131148,
    		'imei' => null,
    		'nlicencia' => null,
    		'categoria' => 'A',
    		'fechavencimiento' => '2018-12-11',
    		'foto' => 'luis.jpg',
            'condicion' => null
		]);
    }
}
