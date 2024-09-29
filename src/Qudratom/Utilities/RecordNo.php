<?php
namespace Qudratom\Utilities;


class RecordNo
{
    public $no = 0 ;
    public $start = 0 ;
    public function setStartingNo($no) {
        $this->no = $no ;
        $this->start = $no ;
    }
    public function getNext()
    {
        return (++ $this->no) ;
    }
    public function reset(){
        $this->no = $this->start ;
        return $this->no ;
    }
    public static function rowIndex( $suggest = null ) {
        if( @$suggest ) {
            return $suggest ;
        }
        return md5( uniqid( time() ) ) ;
    }
}
?>