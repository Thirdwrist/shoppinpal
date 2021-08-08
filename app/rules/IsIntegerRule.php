<?php 

namespace App\Rules;

class IsIntegerRule implements RuleInterface{

    /**
     * @inheritDoc
     */
    public function passes($attribute, $value)
    {
        return is_integer($value);
    }
    
     /**
     * @inheritDoc
     */
    public function message($attribute)
    {
        return ucfirst($attribute) ." should be an integer";
    }
}