<?php

namespace App\Tests;

use App\Rules\IsRequiredRule;
use PHPUnit\Framework\TestCase;

class IsRequiredRuleTest extends TestCase
{
     /**
     * Test that class method `passes` when valid arguments passed
     *
     * @return void
     */
    public function testPassesWithCorrectStringInput()
    {
        $res = (new IsRequiredRule)->passes('randomAttribute', 'string value');
        $this->assertTrue($res);
    }

    /**
     * Test that class method `passes` fails when invalid input is passed
     *
     * @return void
     */
    public function testFailsWithWrongInput()
    {
        $res = (new IsRequiredRule)->passes('randomAttribute', null);
        $this->assertFalse($res);
    }

    /**
     * Test that the class method `message` returns a valid 
     *
     * @return void
     */
    public function testMessageReturnsString()
    {
        $res = (new IsRequiredRule)->message('randomAttribute');
        $this->assertIsString($res);
    }   

    /**
     * Test that the class method 'message' returns a string with the attribute name
     *
     * @return void
     */
    public function testMessageContainsFieldName()
    {
        $attribute = 'randomAttribute';
        $res = (new IsRequiredRule)->message($attribute);
        $this->assertStringContainsStringIgnoringCase($attribute, $res);
    }
}