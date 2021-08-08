<?php

use App\Rules\{
    IsStringRule, 
    IsRequiredRule, 
    IsIntegerRule, 
    IsPDFRule, 
    IsDateRule
};

return [
    'required'=> IsRequiredRule::class,
    'string'=> IsStringRule::class,
    'integer'=>IsIntegerRule::class, 
    'pdf'=>IsPDFRule::class, 
    'date'=> IsDateRule::class
];