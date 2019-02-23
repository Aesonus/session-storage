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

use Aesonus\Session\Session;
use Aesonus\TestLib\BaseTestCase;

/**
 * Tests the Session class
 *
 * @author Aesonus <corylcomposinger at gmail.com>
 */
class SessionTest extends BaseTestCase
{
    protected $sessionMockBuilder;
    protected $session;
    protected $sessionVar;

    public function setUp(): void
    {
        $this->sessionMockBuilder = $this->getMockBuilder(Session::class);
        $this->session = $this
            ->sessionMockBuilder
            ->setMethods()
            ->getMock();
        $this->sessionVar = &$_SESSION;
    }

    protected function tearDown(): void
    {
        unset($_SESSION);
    }

    /**
     * @test
     */
    public function setKeyIsImmutable()
    {
        $new_session = $this->session->setKey('foo');
        $this->assertNotSame($new_session, $this->session);
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
     * @dataProvider setMethodSetsTheValueAtSetKeyDataProvider
     */
    public function setMethodSetsTheValueAtSetKey($expected_key, $expected_value)
    {
        $session = $this->session->setKey($expected_key);
        $session->set($expected_value);

        $actual = $this->sessionVar[$expected_key];
        $this->assertEquals($expected_value, $actual);
    }

    public function setMethodSetsTheValueAtSetKeyDataProvider()
    {
        return [
            ['key', 4],
            'numeric key' => ['8', 'value'],
            ['obj', new \stdClass()]
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
