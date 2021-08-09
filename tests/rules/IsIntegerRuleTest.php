<?php

namespace App\Tests;

use App\Rules\IsIntegerRule;
use PHPUnit\Framework\TestCase;

class IsIntegerRuleTest extends TestCase
{
     /**
     * Test that class method `passes` when valid arguments passed
     *
     * @return void
     */
    public function testPassesWithCorrectStringInput()
    {
        $res = (new IsIntegerRule)->passes('randomAttribute', 1111);
        $this->assertTrue($res);
    }

    /**
     * Test that class method `passes` fails when invalid input is passed
     *
     * @return void
     */
    public function testFailsWithWrongInput()
    {
        $res = (new IsIntegerRule)->passes('randomAttribute', 'random string');
        $this->assertFalse($res);
    }

    /**
     * Test that the class method `message` returns a valid 
     *
     * @return void
     */
    public function testMessageReturnsString()
    {
        $res = (new IsIntegerRule)->message('randomAttribute');
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
        $res = (new IsIntegerRule)->message($attribute);
        $this->assertStringContainsStringIgnoringCase($attribute, $res);
    }
}