<?php

namespace App\Models\Virtual;

use App\Models\Languages;
use Illuminate\Database\Eloquent\Model;
use PhpSpec\Exception\Exception;

/**
 * Class DummyClass
 */
class Language extends Model
{
    public static function explain($type)
    {
        $language = Languages::find($type) ;
        if( $language ) {

            if ($language->flag) {
                $lang = $language->name;
                return $lang;
            } else {
                return 'Other' . "(" . $language->name . ")";
            }
        }
    }
}