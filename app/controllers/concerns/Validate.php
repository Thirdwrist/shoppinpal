<?php

namespace App\Controllers\Concerns;

use App\Nucleus\{App, Request};
use Exception;

/**
 * Validation Logic
 */
trait Validate
{
    
    /**
     * Collect inputs and their rules for validation
     *
     * @throws Exception
     * @param array $validationRules
     * @return void
     * 
     */
    protected function validate(array $validationRules)
    {
        $validationResponse = [];
        foreach ($validationRules as $attribute => $rules) {
            $check = $this->checkRule($attribute, $rules);
            if(!empty($check)) $validationResponse[$attribute] = $check;
            
        }

        if(!empty($validationResponse))
        {
            return $this->response(400, 'Validation error', null, $validationResponse);
        }
    }

    /**
     * Check the input against the rules assigned
     *
     * @throws Exception
     * @param string $input
     * @param array $rules
     * @return array
     */
    private function checkRule(string $input, array $rules)
    {
        $state = [];
        foreach($rules as $rule)
        {
            if(array_key_exists($rule, App::get('validate')))
            {
                $rule = App::get('validate')[$rule];
                $validate = new $rule;

                if($validate->passes($input, Request::get($input)))
                {
                    continue;
                } 
                else
                {
                    $state[] = $validate->message($input);
                };
            }else{
                throw new Exception("$rule validation rule does not exist", 500);
            }
        }

        return $state;
    }
}
