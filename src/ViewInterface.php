<?php

namespace Mwyatt\Core;

/**
 * @author Martin Wyatt <martin.wyatt@gmail.com>
 * @version     0.1
 * @license http://www.php.net/license/3_01.txt PHP License 3.01
 */
interface ViewInterface
{


    /**
     * must store the routes found in the registry for building urls
     * always prepend this package template path
     */
    public function __construct(\Mwyatt\Core\Url $url);


    /**
     * while searching for templates it will look through an array
     * of paths
     * throws exception if the path does not exist or is not a directory
     * @param  string $path 
     * @return object       
     */
    public function prependTemplatePath($path);


    /**
     * while searching for templates it will look through an array
     * of paths
     * throws exception if the path does not exist or is not a directory
     * @param  string $path 
     * @return object       
     */
    public function appendTemplatePath($path);

    
    /**
     * load template file and prepare all objects for output
     * @param  string $templatePath
     */
    public function getTemplate($templatePath);


    /**
     * gets just the base file path
     * @param  string $append
     * @return string
     */
    public function getPath($append = '');


    /**
     * finds a template
     * @param  string $append    foo/bar
     * @return string            the path
     */
    public function getPathTemplate($append, $ext = 'php');


    /**
     * allows easy registering of additional asset paths
     * these can be then added in order inside the skin
     * header/footer
     * @param  string $type mustache|css|js
     * @param  string $path foo/bar
     * @return object
     */
    public function appendAsset($type, $path);
}
