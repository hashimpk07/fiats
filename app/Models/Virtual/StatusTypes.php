<?php

	namespace App\Models\Virtual;

	use Illuminate\Database\Eloquent\Model;

	/**
	 * Class DummyClass
	 */
	class StatusTypes extends Model
	{
		public static function collections()
		{
			return [
				ACKNOWLEDGED => 'Acknowledged',
				PAID => 'Paid',
				REGISTERED => 'Registered'
			] ;
		}
		public static function explain($status)
		{
			switch( $status ) {
				case ACKNOWLEDGED :
					return 'Acknowledged';
					break;
				case PAID :
					return 'Paid';
					break;
				case REGISTERED :
					return 'Registered';
					break;
			}
			return 'Registered' ;
		}
	}