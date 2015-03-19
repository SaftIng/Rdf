<?php

namespace Saft\Rdf;

class NamedNodeTest extends \PHPUnit_Framework_TestCase
{

    protected $testUri = 'http://saft/test/';

    /**
     *
     */
    public function setUp()
    {
        parent::setUp();

        $this->fixture = new \Saft\Rdf\NamedNodeImpl($this->testUri);
    }

    /**
     *
     */
    public function tearDown()
    {
        parent::tearDown();
    }

    /**
     * Tests check
     */
    public function testCheck()
    {
        $this->assertFalse($this->fixture->check(''));
        $this->assertFalse($this->fixture->check('http//foobar/'));

        $this->assertTrue($this->fixture->check('http:foobar/'));
        $this->assertTrue($this->fixture->check('http://foobar/'));
        $this->assertTrue($this->fixture->check('http://foobar:42/'));
        $this->assertTrue($this->fixture->check('http://foo:bar@foobar/'));
    }

    /**
     * Tests instanciation
     */
    public function testInstanciationInvalidUri()
    {
        $this->setExpectedException('\Exception');

        $this->fixture = new \Saft\Rdf\NamedNodeImpl('foo');
    }

    public function testInstanciationNull()
    {
        $this->fixture = new \Saft\Rdf\NamedNodeImpl(null);
        $this->assertEquals(null, $this->fixture->getValue());
    }

    public function testInstanciationValidUri()
    {
        $this->fixture = new \Saft\Rdf\NamedNodeImpl($this->testUri);
        $this->assertEquals($this->testUri, $this->fixture->getValue());
    }

    /**
     * Tests isBlank
     */
    public function testIsBlank()
    {
        $this->assertFalse($this->fixture->isBlank());
    }

    /**
     * Tests isConcrete
     */
    public function testIsConcrete()
    {
        $this->fixture = new \Saft\Rdf\NamedNodeImpl($this->testUri);
        $this->assertTrue($this->fixture->isConcrete());
    }

    /**
     * Tests isLiteral
     */
    public function testIsLiteral()
    {
        $this->assertFalse($this->fixture->isLiteral());
    }

    /**
     * Tests isNamed
     */
    public function testIsNamed()
    {
        $this->assertTrue($this->fixture->isNamed());
    }

    /**
     * Tests isVariable
     */
    public function testIsVariable()
    {
        $this->assertFalse($this->fixture->isVariable());
    }
}
