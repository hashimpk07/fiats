<?php
namespace Qudratom\Utilities;


use ArrayIterator;
use IteratorAggregate;
use Traversable;

class Objectize implements IteratorAggregate
{
    public $array ;

    public function __construct($array)
    {
        $this->array = $array ;
    }
    public function getIterator()
    {
        return new ArrayIterator($this->array) ;
    }
    public function getArray()
    {
        return $this->array ;
    }
}