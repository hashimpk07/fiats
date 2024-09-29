<?php

use Illuminate\Database\Seeder;

class PaymentModesTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('payment_modes')->delete();
        
		\DB::table('payment_modes')->insert(array (
			0 => 
			array (
				'id' => 1,
				'name' => 'Cheque',
			),
			1 => 
			array (
				'id' => 2,
				'name' => 'NEFT',
			),
			2 => 
			array (
				'id' => 3,
				'name' => 'A/c Pay',
			),
			3 => 
			array (
				'id' => 4,
				'name' => 'A/c Transfer',
			),
			4 => 
			array (
				'id' => 5,
				'name' => 'EMO',
			),
			5 => 
			array (
				'id' => 6,
				'name' => 'Cash',
			),
			6 => 
			array (
				'id' => 7,
				'name' => 'DD',
			),
		));
	}

}
