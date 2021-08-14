<?php 

namespace App\Rules;

use DateTime;

class IsDateRule implements RuleInterface
{

    /**
     * @inheritDoc
     */
    public function passes($attribute, $value)
    {
        return DateTime::createFromFormat("Y-m-d", $value) !== false;
    }
    
     /**
     * @inheritDoc
     */
    public function message($attribute)
    {
        return ucfirst($attribute) ." requires a date string format of Y-m-d";
    }
}