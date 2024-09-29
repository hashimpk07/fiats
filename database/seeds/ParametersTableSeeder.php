<?php

use Illuminate\Database\Seeder;

class ParametersTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('parameters')->delete();
        
		\DB::table('parameters')->insert(array (
			0 => 
			array (
				'id' => 1,
				'name' => 'POSTAL_COLUMNS',
				'value' => '2',
			),
			1 => 
			array (
				'id' => 2,
				'name' => 'SMS_WORKINGKEY',
				'value' => '15790cu39v318w9va79i',
			),
			2 => 
			array (
				'id' => 3,
				'name' => 'SMS_SENDER',
				'value' => 'QRDLab',
			),
			3 => 
			array (
				'id' => 4,
				'name' => 'SMS_URL',
				'value' => 'http://alerts.smsclogin.com/api/web2sms.php?workingkey=%workingkey&sender=%sender&to=%to&message=%message',
			),
			4 => 
			array (
				'id' => 5,
				'name' => 'MAIL_DRIVER',
				'value' => 'smtp',
			),
			5 => 
			array (
				'id' => 6,
				'name' => 'MAIL_HOST',
				'value' => 'smtp.mailgun.org',
			),
			6 => 
			array (
				'id' => 7,
				'name' => 'MAIL_PORT',
				'value' => '465',
			),
			7 => 
			array (
				'id' => 8,
				'name' => 'MAIL_USERNAME',
				'value' => 'postmaster@sandboxa84aa39e443c43f49fa32b28e8ae3d77.mailgun.org',
			),
			8 => 
			array (
				'id' => 9,
				'name' => 'MAIL_PASSWORD',
				'value' => 'gun*1721',
			),
			9 => 
			array (
				'id' => 10,
				'name' => 'MAIL_SENDER',
				'value' => 'nithin@alpha.qudratom.com',
			),
			10 => 
			array (
				'id' => 11,
				'name' => 'BASE_AMOUNT',
				'value' => '100',
			),
			11 => 
			array (
				'id' => 12,
				'name' => 'N_DATE',
				'value' => '2016-12-01',
			),
			12 => 
			array (
				'id' => 13,
				'name' => 'T_DATE',
				'value' => '2016-11-04',
			),
			13 =>
			array (
				'id' => 14,
				'name' => 'REGISTRATION_NO',
				'value' => '1',
			),
		));
	}

}
