<?php

namespace Mwyatt\Core;

class Collection implements \IteratorAggregate
{


    protected $collection;


    public function getIterator()
    {
        return new ArrayIterator($this->collection);
    }
}
