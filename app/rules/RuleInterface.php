<?php

namespace App\Rules;

interface RuleInterface{

    /**
     * This determines if the request input passes the validation or not.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    function passes(string $attribute, mixed $value);

    /**
     * Message to return on validation fail
     *
     * @param string $attribute
     * @return void
     */
    function message(string $attribute);
    
}