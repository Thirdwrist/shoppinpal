<?php 

namespace App\Rules;

use App\Nucleus\Request;

class IsRequiredRule implements RuleInterface{

    /**
     * @inheritDoc
     */
    public function passes($attribute, $value)
    {
        return !is_null($value);
    }
    
     /**
     * @inheritDoc
     */
    public function message($attribute)
    {
        return ucfirst($attribute) ." field is required";
    }
}