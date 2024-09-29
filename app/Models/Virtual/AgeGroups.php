<?php

	namespace App\Models\Virtual;

	use Illuminate\Database\Eloquent\Model;
	/**
	 */
	class AgeGroups extends Model
	{
		public static function collections()
		{
			return array (
				'1' => 'Upto 10 (A)',
				'2' => '11 - 20 (B)',
				'3' => '21 - 30 (C)',
				'4' => '31 - 40 (D)',
				'5' => '41 - 50 (E)',
				'6' => '51 - 60 (F)',
				'7' => '61 - 70 (G)',
				'8' => '71 - 80 (H)',
				'9' => '81 - 90 (I)',
				'10' => 'Above 90 (J)',
			);
		}
        public static function collection()
        {
            return array (
                '1' => 'A',
                '2' => 'B',
                '3' => 'C',
                '4' => 'D',
                '5' => 'E',
                '6' => 'F',
                '7' => 'G',
                '8' => 'H',
                '9' => 'I',
                '10' => 'J',
            );
        }

		public static function explain($age)
		{
			if($age <= 10 ) {
				return 'Upto 10 (A)' ;
			}
			else if($age <= 20 ) {
				return '11 - 20 (B)' ;
			}
			else if($age <= 30 ) {
				return '21 - 30 (C)' ;
			}
			else if($age <= 40 ) {
				return '31 - 40 (D)' ;
			}
			else if($age <= 50 ) {
				return '41 - 50 (E)' ;
			}
			else if($age <= 60 ) {
				return '51 - 60 (F)' ;
			}
			else if($age <= 70 ) {
				return '61 - 70 (G)' ;
			}
			else if($age <= 80 ) {
				return '71 - 80 (H)' ;
			}
			else if($age <= 90 ) {
				return '81 - 90 (I)' ;
			}
			else {
				return 'Above 90 (J)' ;
			}
		}

		public static function explainGroup($ageGroup)
		{
			$set = self::collections() ;

			if( isset($set[$ageGroup]) ) {
				return $set[$ageGroup] ;
			}

			if( $ageGroup <= 0 ) {
				return $set[1] ;
			}
			else if( $ageGroup > 10 ) {
				return $set[10] ;
			}
		}
		public static function nameGroup($ageGroup)
		{
			$set = self::collection() ;

			if( isset($set[$ageGroup]) ) {
				return $set[$ageGroup] ;
			}

			if( $ageGroup <= 0 ) {
				return $set[1] ;
			}
			else if( $ageGroup > 10 ) {
				return $set[10] ;
			}
		}
	}
