<?php
/*
 * This file is part of the session-storage package
 * 
 *  (c) Cory Laughlin <corylcomposinger@gmail.com>
 * 
 * For full copyright and license information, please view the LICENSE
 * file that was distributed with this source code
 */

namespace Aesonus\Session\Tests;

/**
 * Tests the Session class
 *
 * @author Aesonus <corylcomposinger at gmail.com>
 */
class SessionTest extends \Aesonus\TestLib\BaseTestCase
{

    protected $sessionMockBuilder;
    protected $session;
    protected $sessionVar = [];

    public function setUp()
    {
        $this->sessionMockBuilder = $this->getMockBuilder(\Aesonus\Session\Session::class);
        $this->session = $this
            ->sessionMockBuilder
            ->setMethods()
            ->setConstructorArgs([&$this->sessionVar])
            ->getMock();
    }
    
    /**
     * @test
     */
    public function setupSetsSessionPropertyToSessionVarReference()
    {
        //Set a value in the variable. If it's the same as in the test object
        //then the variable was passed by reference
        $this->sessionVar['test'] = true;
        $this->assertEquals($this->sessionVar, $this->getPropertyValue($this->session, 'session'));
    }
    
    /**
     * @test
     */
    public function setupMethodIsFluent()
    {
        $this->assertSame($this->session, $this->session->setup());
    }
    
    /**
     * @test
     * @dataProvider validKeyDataProvider
     */
    public function setKeySetsTheKeyProperty($expected_key)
    {
        $session = $this->session->setKey($expected_key);
        $actual = $this->getPropertyValue($session, 'key');
        $this->assertSame($expected_key, $actual);
    }
    
    public function validKeyDataProvider()
    {
        return [
            ['key'],
            [2]
        ];
    }
    
    /**
     * @test
     */
    public function setKeyIsImmutable()
    {
        $new_session = $this->session->setKey('foo');
        $this->assertInstanceOf(\Aesonus\Session\Contracts\SessionInterface::class, $new_session);
        return $new_session;
    }
    
    /**
     * @test
     * @depends setKeyIsImmutable
     */
    public function hasKeyReturnsTrueIfTheKeyPropertyIsSet($session)
    {
        $this->assertTrue($session->hasKey());
        return $session;
    }
    
    /**
     * @test
     */
    public function hasKeyReturnsFalseIfTheKeyPropertyIsNotSet()
    {
        $this->assertFalse($this->session->hasKey());
    }
    
    /**
     * @test
     * @depends hasKeyReturnsTrueIfTheKeyPropertyIsSet
     */
    public function getKeyReturnsKeyIfItIsSet($session)
    {
        $this->assertEquals('foo', $session->getKey());
    }
    
    /**
     * @test
     */
    public function setMethodIsFluent()
    {
        $this->assertSame($this->session, $this->session->set('testset'));
    }
    
    /**
     * @test
     * @dataProvider setMethodSetsTheValueAtKeyPropertyDataProvider
     */
    public function setMethodSetsTheValueAtKeyProperty($expected_value)
    {
        $expected['test key'] = $expected_value;
        $this->session->setKey('test key');
        $this->session->set($expected_value);
        
        $actual = $this->getPropertyValue($this->session, 'session');
        $this->assertEquals($expected, $actual);
    }

    public function setMethodSetsTheValueAtKeyPropertyDataProvider()
    {
        return [
            ['value'],
            [4],
            [new \stdClass()]
        ];
    }
    
    private function setUpGetHasAndClearTests()
    {
        // This mocks a session value that has already been set
        $this->sessionVar['test key'] = 3.14159;
        $this->sessionVar['not accessed'] = 'do not pick me';
        $this->session->setKey('test key');
    }
    
    /**
     * @test
     */
    public function hasMethodReturnsTrueIfValueIsSetAtKeyProperty()
    {
        $this->setUpGetHasAndClearTests();
        $this->assertTrue($this->session->has());
    }
    
    /**
     * @test
     */
    public function hasMethodReturnsFalseIfValueIsNotSetAtKeyProperty()
    {
        $this->setUpGetHasAndClearTests();
        unset($this->sessionVar['test key']);
        $this->assertFalse($this->session->has());
    }
    
    /**
     * @test
     */
    public function getMethodReturnsValueAtKeyProperty()
    {
        $this->setUpGetHasAndClearTests();
        $this->assertEquals(3.14159, $this->session->get());
    }
    
    /**
     * @test
     */
    public function getMethodReturnsNullIfValueIsNotSetAtKeyProperty()
    {
        $this->session->setKey(4);
        $this->assertNull($this->session->get());
    }

    /**
     * @test
     */
    public function clearMethodUnsetsValueAtKey()
    {
        $this->setUpGetHasAndClearTests();
        $this->session->clear();
        $this->assertArrayNotHasKey('test key', $this->sessionVar);
    }
    
    /**
     * @test
     */
    public function clearMethodIsFluent()
    {
        $this->setUpGetHasAndClearTests();
        $this->assertSame($this->session, $this->session->clear());
    }
}
