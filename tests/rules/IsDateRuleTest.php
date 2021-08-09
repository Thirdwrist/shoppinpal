<?php

namespace App\Tests;

use App\Rules\IsDateRule;
use PHPUnit\Framework\TestCase;

class IsDateRuleTest extends TestCase
{
     /**
     * Test that class method `passes` when valid arguments passed
     *
     * @return void
     */
    public function testPassesWithCorrectStringInput()
    {
        $res = (new IsDateRule)->passes('randomAttribute', '2021-12-09');
        $this->assertTrue($res);
    }

    /**
     * Test that class method `passes` fails when invalid input is passed
     *
     * @return void
     */
    public function testFailsWithWrongInput()
    {
        $res = (new IsDateRule)->passes('randomAttribute', 'random string');
        $this->assertFalse($res);
    }

    /**
     * Test that class method `passes` fails when invalid date format input is passed
     *
     * @return void
     */
    public function testFailsOnDateWithInvalidFormat()
    {
        $res = (new IsDateRule)->passes('randomAttribute', '09-12-2021');
        $this->assertFalse($res);
    }

    /**
     * Test that the class method `message` returns a valid 
     *
     * @return void
     */
    public function testMessageReturnsString()
    {
        $res = (new IsDateRule)->message('randomAttribute');
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
        $res = (new IsDateRule)->message($attribute);
        $this->assertStringContainsStringIgnoringCase($attribute, $res);
    }
}