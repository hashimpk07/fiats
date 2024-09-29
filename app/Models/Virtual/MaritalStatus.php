<?php

	namespace App\Models\Virtual;

	use Illuminate\Database\Eloquent\Model;

	/**
	 * Class DummyClass
	 */
	class MaritalStatus extends Model
	{
		public static function explain($type)
		{
			$colloection = self::collections() ;
			return $colloection[$type] ;
		}
		public static function collections()
		{
			return array (
				'1' => 'Married',
				'2' => 'Unmarried',
				'3' => 'Religious',
				'4' => 'Others',
			) ;
		}
	}