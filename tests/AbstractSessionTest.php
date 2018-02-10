<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Aesonus\Tests;

use Aesonus\Session\Contracts\SessionInterface;

/**
 * Description of newPHPClass
 *
 * @author Aesonus <corylcomposinger at gmail.com>
 */
class AbstractSessionTest extends \PHPUnit\Framework\TestCase
{

    protected $session;

    public function setUp()
    {
        $this->session = new Session();
    }

    /**
     * @dataProvider keyDataProvider
     */
    public function testKey($expectedKey, $key)
    {
        //Must return instance of SessionInterface
        $this->assertInstanceOf(SessionInterface::class, $this->session->setKey($key));

        //Must return true
        $this->assertTrue($this->session->hasKey());

        //Must return "key"
        $this->assertEquals($expectedKey, $this->session->getKey());
    }

    public function keyDataProvider()
    {
        return [
            ['key', 'key'],
            [2, 2]
        ];
    }

    /**
     * @dataProvider setGetDataProvider
     */
    public function testSetGet($expected, $key, $setTo)
    {
        $this->assertEquals($expected, $this->session->setKey($key)->set($setTo)->get());
    }

    public function setGetDataProvider()
    {
        return [
            [3, 'test', 3],
            [54, 'test', 54],
            ['this', 'tester', 'this'],
            [[3], 'testes', [3]],
            [['l' => 3], 'test', ['l' => 3]],
        ];
    }

    /**
     * @dataProvider setGetNotEqual
     */
    public function testSetGetNotEqual($notExpected, $key, $setTo)
    {
        $this->session->setKey($key)->set($setTo);
        $this->assertNotEquals($notExpected, $this->session->get());
    }

    public function setGetNotEqual()
    {
        return [
            [54, 'key', 56],
            ["no", 4, "yes"],
            [['l' => 4], 56, ['y' => 4]]
        ];
    }
    
    public function testHas()
    {
        $this->session->setKey('key');
        $this->assertFalse($this->session->has());
        $this->session->set(69);
        $this->assertTrue($this->session->has());
    }
}
