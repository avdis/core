<?php

namespace Mwyatt\Core;

abstract class AbstractFactory
{


    protected $defaultNamespace;


    public function getDefaultNamespace($append = '')
    {
        return $this->defaultNamespace . $append;
    }


    public function getDefaultNamespaceAbs($append = '')
    {
        $namespace = '\\' . $this->getDefaultNamespace($append);
        if (!class_exists($namespace)) {
            throw new \Exception("'$namespace' does not exist.");
        }
        return $namespace;
    }


    public function setDefaultNamespace($namespace)
    {
        $this->defaultNamespace = $namespace;
    }
}
