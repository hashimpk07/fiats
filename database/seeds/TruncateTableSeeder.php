<?php

use Illuminate\Database\Seeder;

class TruncateTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		DB::statement('set foreign_key_checks=0;');

		$tableNames = Schema::getConnection()->getDoctrineSchemaManager()->listTableNames();
		foreach ($tableNames as $name)
		{
			if ($name == 'migrations')
			{
				continue ;
			}
			DB::table($name)->truncate();
		}
	}

}
