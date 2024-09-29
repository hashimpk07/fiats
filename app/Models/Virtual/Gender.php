<?php

	namespace App\Models\Virtual;

	use Illuminate\Database\Eloquent\Model;

	/**
	 * Class DummyClass
	 */
	class Gender extends Model
	{
		public static function explain($type)
		{
			$colloection = self::collections() ;
			if( isset($colloection[$type]) )
			{
				return $colloection[$type] ;
			}
			return '' ;
		}
		public static function collections()
		{
			return array (
				'M' => 'Male',
				'F' => 'Female',
			) ;
		}
	}