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

		//Fiew Currencies
		$this->call('TruncateTableSeeder');
		$this->call('UsersTableSeeder');
		$this->call('LanguagesTableSeeder');
		$this->call('SalutationsTableSeeder');
		$this->call('ParametersTableSeeder');
		$this->call('PaymentModesTableSeeder');
		$this->call('TemplatesTableSeeder');
		$this->call('PaymentTypesTableSeeder');
	}

}
