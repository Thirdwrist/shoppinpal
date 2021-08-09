<?php

namespace App\Controllers;

use App\Controllers\Concerns\Validate;

class BaseController
{
    use Validate;
    
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

}