<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('users')->delete();
        
		\DB::table('users')->insert(array (
			0 => 
			array (
				'id' => 1,
				'username' => 'admin',
				'password' => '$2y$10$oMwFvv2mMb9LAFPzmI1phe/wyQWGPvwDrSyNfQenLtapgUb7RRtCu',
				'remember_token' => 'WQjyHnUuMUrVu9AX85lWvgRSz1TqQW0Vv95Jx5OpkJTOdqLFTIxpIFodJh8H',
			),
		));
	}

}
