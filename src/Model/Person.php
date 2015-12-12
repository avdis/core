<?php
namespace Mwyatt\Core\Model;

/**
 * @author Martin Wyatt <martin.wyatt@gmail.com>
 * @license http://www.php.net/license/3_01.txt PHP License 3.01
 */
class Person
{


	public $nameFirst;


	public $nameLast;


	public $addresses;


    public function getName()
    {
    	return $this->nameFirst . ' ' . $this->nameLast;
    }
}