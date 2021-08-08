<?php

namespace App\Controllers;

use App\Nucleus\App;
use App\Nucleus\Request;
use Exception;

class BaseController
{
    /**
     * Response for requests
     *
     * @param int $status
     * @param string $message
     * @param array $body
     * @return void
     */
    protected function response($status, $message, $body = null, $error = null)
    {
        $res = [
            'status'=> $status, 
            'message'=> $message
        ];

        if($body) $res['data'] = $body;
        if($error) $res['errors'] = $error;
        
        header('Content-Type: application/json');
        header("HTTP/1.1 $status ");
        
        echo json_encode($res);
        exit;
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
        $validationResponse = [];
        foreach ($validationRules as $attribute => $rules) {
           $validationResponse[$attribute] = $this->checkRule($attribute, $rules);
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