<?php

namespace Mwyatt\Core;

class UrlTest extends \PHPUnit_Framework_TestCase
{


    public $host = '192.168.1.24';


    public $path = '/core/foo/bar/?foo=bar';


    public $pathInstall = 'core/';


    public function __construct()
    {
        $this->url = new \Mwyatt\Core\Url($this->host, $this->path, $this->pathInstall);
    }


    public function testConstruct()
    {
        $this->assertEquals('foo/bar/?foo=bar', $this->url->getPath());
    }


    public function testGetPath()
    {
        $this->assertEquals('foo/bar/?foo=bar', $this->url->getPath());
        $urlAlt = new \Mwyatt\Core\Url($this->host, '/core/', $this->pathInstall);
        $this->assertEquals('', $urlAlt->getPath());
    }


    public function testGenerate()
    {
        $this->testSetRoutes();
        $this->assertEquals('http://192.168.1.24/core/foo/bar/1/', $this->url->generate('test.params', ['name' => 'bar', 'id' => 1]));
        $this->assertEquals('http://192.168.1.24/core/', $this->url->generate('test.simple'));
    }


    /**
     * @expectedException \Exception
     */
    public function testGenerateFail()
    {
        $this->assertEquals('http://192.168.1.24/core/foo/bar/1/', $this->url->generate('route.not.exist'));
    }


    public function testSetRoutes()
    {
        $router = new \Mwyatt\Core\Router(new \Pux\Mux);
        $view = new \Mwyatt\Core\View;
        $routes = array_merge(
            include $view->getPathBasePackage('routes.php')
        );
        $router->appendMuxRoutes($routes);
        $this->url->setRoutes($router->getMux());
    }


    /**
     * accepts a base path then a relative end
     * too convoluted?
     */
    public function testGenerateVersioned()
    {
        $this->assertContains('http://' . $this->host . '/' . $this->pathInstall . 'asset/test.css', $this->url->generateVersioned((string) __DIR__ . '/../', 'asset/test.css'));
    }
}
