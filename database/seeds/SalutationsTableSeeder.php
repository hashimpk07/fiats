<?php

use Illuminate\Database\Seeder;

class SalutationsTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('salutations')->delete();
        
		\DB::table('salutations')->insert(array (
			0 => 
			array (
				'id' => 1,
				'name' => 'Mr',
			),
			1 => 
			array (
				'id' => 2,
				'name' => 'Ms',
			),
			2 => 
			array (
				'id' => 3,
				'name' => 'Mrs',
			),
			3 => 
			array (
				'id' => 4,
				'name' => 'Miss',
			),
			4 => 
			array (
				'id' => 5,
				'name' => 'Master',
			),
			5 => 
			array (
				'id' => 6,
				'name' => 'Rev.Fr.',
			),
			6 => 
			array (
				'id' => 7,
				'name' => 'Rev.Sr.',
			),
			7 => 
			array (
				'id' => 8,
				'name' => 'Bp.',
			),
		));
	}

}
