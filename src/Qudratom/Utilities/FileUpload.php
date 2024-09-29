<?php

namespace Qudratom\Utilities;


use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class FileUpload
{
    public static $upload_dir = 'public/data';

    /**
     * Upload files
     *
     * @param $fileField html field name
     * @param $namePrefix name part of file.
     * @return String null string on failure, or uploaded file name on success.
     */
    public static function upload($fileField, $index = null, $namePrefix = null )
    {
        //upload dir
        $dstDir = self::$upload_dir ;
        //name prefix
        if( ! $namePrefix )
        {
            $namePrefix = md5(uniqid()) ;
        }

        if( $index ) {
            $fileObject = @Input::file($fileField)[$index] ;
        }
        else {
            $fileObject = Input::file($fileField) ;
        }
        // getting all of the post data
        $file = array('file' => $fileObject) ;
        // setting up rules
        $rules = array('file' => 'required',); //mimes:jpeg,bmp,png and for max size max:10000
        // doing the validation, passing post data, rules and the messages
        $validator = Validator::make($file, $rules);
        if ($validator->fails()) {
            // send back to the page with the input data and errors
            return '' ;
        }
        else
        {
            // checking file is valid.
            if ( $fileObject->isValid() ) {
                $destinationPath = $dstDir ; // upload path

                $extension = $fileObject->getClientOriginalExtension(); // getting image extension

                $fileName = $namePrefix . '.' . $extension; // renameing image

                $fileObject->move($destinationPath, $fileName); // uploading file to given path

                return $fileName ;
            }
        }
        return '' ;
    }
    public static function downloadUrl($filename)
    {
        return URL::asset( self::$upload_dir . '/' . $filename );
    }
    public static function fileExtension( $filename, $include_dot = false ) {
        $ext = pathinfo($filename, PATHINFO_EXTENSION) ;
        if( $include_dot ) {
            return "." . $ext ;
        }
        return $ext;
    }
}