<?php

namespace App\Tests;

use App\Rules\IsStringRule;
use PHPUnit\Framework\TestCase;

class IsStringRuleTest extends TestCase
{
    /**
     * Test that class method `passes` when valid arguments passed
     *
     * @return void
     */
    public function testPassesWithCorrectStringInput()
    {
        $res = (new IsStringRule)->passes('randomAttribute', 'string value');
        $this->assertTrue($res);
    }

    /**
     * Test that class method `passes` fails when invalid input is passed
     *
     * @return void
     */
    public function testFailsWithWrongInput()
    {
        $res = (new IsStringRule)->passes('randomAttribute', 1111);
        $this->assertFalse($res);
    }

    /**
     * Test that the class method `message` returns a valid 
     *
     * @return void
     */
    public function testMessageReturnsString()
    {
        $res = (new IsStringRule)->message('randomAttribute');
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
        $res = (new IsStringRule)->message($attribute);
        $this->assertStringContainsStringIgnoringCase($attribute, $res);
    }

}