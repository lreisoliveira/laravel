<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();
		$this->call('TesteTableSeeder');
	}

}

class TesteTableSeeder extends Seeder {

	public function run()
	{
		//DB::table('teste')->delete();
		Teste::create([
				'email'=>'Página inicial',
				'token'=>'Criado com Laravel',
		]);
	}

}