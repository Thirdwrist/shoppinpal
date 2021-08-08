<?php

namespace App\Controllers;

use App\Nucleus\App;
use App\Nucleus\Request;

class BaseController
{
    /**
     * response for requests
     *
     * @param int $status
     * @param string $message
     * @param array $body
     * @return void
     */
    protected function response($status, $message, $body = null)
    {
        $res = [
            'status'=> $status, 
            'message'=> $message
        ];

        if($res) $data['data'] = $res;
        
        header('Content-Type: application/json');
        echo json_encode($data);
    }


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
        $state = [];
        foreach ($validationRules as $attribute => $rules) {
           $state[] = $this->checkRule($attribute, $rules);
        }

        if(!empty($state))
        {
            // throw exception;
        }
    }

    /**
     * Check the input against the rules assigned
     *
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
                    $state[$input] = [$validate->message];
                };
            }
        }

        return $state;
    }
}