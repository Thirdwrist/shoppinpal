<?php 

namespace App\Rules;

class IsStringRule implements RuleInterface{

    /**
     * @inheritDoc
     */
    public function passes($attribute, $value)
    {
        return is_string($value);
    }
    
     /**
     * @inheritDoc
     */
    public function message($attribute)
    {
        return "String type is required for ". ucfirst($attribute) ." field";
    }
}