<?php

namespace Mwyatt\Core;

class UrlTest extends \PHPUnit_Framework_TestCase
{


    public function testConstruct()
    {
        $url = new \Mwyatt\Core\Url('192.168.1.24', '/core/foo/bar/?foo=bar', 'core/');
        $this->assertEquals('foo/bar/?foo=bar', $url->getPath());
    }


    public function testGetPath()
    {
        $url = new \Mwyatt\Core\Url('192.168.1.24', '/core/foo/bar/?foo=bar', 'core/');
        $this->assertEquals('foo/bar/?foo=bar', $url->getPath());
        $url = new \Mwyatt\Core\Url('192.168.1.24', '/core/', 'core/');
        $this->assertEquals('', $url->getPath());
    }


    public function testGenerate()
    {
        $url = new \Mwyatt\Core\Url('192.168.1.24', '/core/foo/bar/?foo=bar', 'core/');
        $url->setRoutes(include 'routes.php');
        $this->assertEquals('http://192.168.1.24/core/foo/1/', $url->generate('foo.bar', ['bar' => 1]));
    }


    public function testGenerateVersioned()
    {

        // url
        $urlBase = '192.168.1.24/core/';
        $_SERVER['HTTP_HOST'] = '192.168.1.24';
        $_SERVER['REQUEST_URI'] = '/core/foo/bar/';
        $url = new \Mwyatt\Core\Url($urlBase);

        // view
        $this->assertContains('asset/test.css', $url->generateVersioned('asset/test.css'));
    }
}
