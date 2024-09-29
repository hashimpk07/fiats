<?php

use Illuminate\Database\Seeder;

class PaymentTypesTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('payment_types')->delete();
        
	}

}
