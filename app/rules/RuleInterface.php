<?php

namespace App\Rules;

interface RuleInterface{

    /**
     * Function to determine if the request input passes the validation or not.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    function passes(string $attribute, mixed $value);

    /**
     * Message returned when validation fails
     *
     * @return string
     */
    function message();
    
}