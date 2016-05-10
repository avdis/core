<?php

namespace Mwyatt\Core;

abstract class AbstractModel
{


    /**
     * get property via method if in place or just the property
     * @param  string $property
     * @return mixed
     */
    public function get($property)
    {
        $proposedMethod = 'get' . ucfirst($property);

        if (method_exists($this, $proposedMethod)) {
            return $this->$proposedMethod();
        }

        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }
}