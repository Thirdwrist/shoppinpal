<?php

use App\Rules\{
    IsStringRule, 
    IsRequiredRule, 
    IsIntegerRule, 
    IsDateRule
};

/**
 * 
 * Validation rules, must all extend RuleInterface
 */
return [
    'required'=> IsRequiredRule::class,
    'string'=> IsStringRule::class,
    'integer'=>IsIntegerRule::class, 
    'date'=> IsDateRule::class
];