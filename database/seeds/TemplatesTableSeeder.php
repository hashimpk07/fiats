<?php

use Illuminate\Database\Seeder;

class TemplatesTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('templates')->delete();
        
		\DB::table('templates')->insert(array (
			0 => 
			array (
				'id' => 1,
				'code' => 'REGISTERED',
				'subject' => 'Registration mail',
				'message' => 'You are successfully registered. 
{link} follow this link to make payment incase you failed to make payment.',
				'type' => 'E',
			),
			1 => 
			array (
				'id' => 2,
				'code' => 'REGISTERED',
				'subject' => '',
				'message' => 'You are successfully registered.',
				'type' => 'S',
			),
			2 => 
			array (
				'id' => 3,
				'code' => 'PAYMENT_COMPLETED',
				'subject' => 'Succesfully received payment.',
				'message' => 'We received your payment.',
				'type' => 'E',
			),
			3 => 
			array (
				'id' => 4,
				'code' => 'PAYMENT_COMPLETED',
				'subject' => '',
				'message' => 'Payment received. Thank you.',
				'type' => 'S',
			),
			4 => 
			array (
				'id' => 5,
				'code' => 'ACKNOWLEDGE',
				'subject' => 'Course Delivered',
				'message' => 'Course delivered.',
				'type' => 'E',
			),
			5 => 
			array (
				'id' => 6,
				'code' => 'ACKNOWLEDGE',
				'subject' => '',
				'message' => 'Course delivered.',
				'type' => 'S',
			),
			6 => 
			array (
				'id' => 7,
				'code' => 'OTP',
				'subject' => '',
				'message' => 'Your OTP is {otp}',
				'type' => 'S',
			),
		));
	}

}
