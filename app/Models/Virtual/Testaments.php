<?php

	namespace App\Models\Virtual;

	use Illuminate\Database\Eloquent\Model;

	/**
	 * Class DummyClass
	 */
	class Testaments extends Model
	{
		public static function collections()
		{
			return [
				NEW_TESTAMENT => 'New Testament (NT)',
				FULL_TESTAMENT => 'Full Testament (FT)',
			] ;
		}
		public static function explain($status)
		{
			switch( $status ) {
				case NEW_TESTAMENT :
					return 'New';
					break;
				case FULL_TESTAMENT :
					return 'Full';
					break;
			}
			return 'Registered' ;
		}
        public static function explainCode($status)
        {
            switch( $status ) {
                case NEW_TESTAMENT :
                    return 'NT';
                    break;
                case FULL_TESTAMENT :
                    return 'FT';
                    break;
            }
            return 'OT' ;
        }
	}