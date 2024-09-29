<?php

	namespace App\Models\Virtual;

	use Illuminate\Database\Eloquent\Model;

	/**
	 * Class DummyClass
	 */
	class Salutations extends Model
	{
		public static function explain($type)
		{
			$colloection = self::collections() ;
			return $colloection[$type] ;
		}
		public static function collections()
		{
			return array (
				'1' => 'Mr',
				'2' => 'Ms',
				'3' => 'Mrs',
				'4' => 'Miss',
				'5' => 'Master',
				'6' => 'Rev.Fr',
				'7' => 'Rev.Sr',
				'8' => 'Bishop'
			);
		}
	}