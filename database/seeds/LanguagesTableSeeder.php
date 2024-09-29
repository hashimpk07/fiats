<?php

use Illuminate\Database\Seeder;

class LanguagesTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('languages')->delete();
        
		\DB::table('languages')->insert(array (
			0 => 
			array (
				'id' => 1,
				'name' => 'Malayalam',
				'flag' => 1,
			),
			1 => 
			array (
				'id' => 2,
				'name' => 'Tamil',
				'flag' => 1,
			),
			2 => 
			array (
				'id' => 3,
				'name' => 'English',
				'flag' => 1,
			),
			3 => 
			array (
				'id' => 4,
				'name' => 'Other',
				'flag' => 1,
			),
			4 => 
			array (
				'id' => 7,
				'name' => 'Hindi',
				'flag' => 1,
			),
		));
	}

}
