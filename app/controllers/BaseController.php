<?php

namespace App\Controllers;

class BaseController{
    public function base()
    {
        // header('Content-Type: application/json');
        echo json_encode(['key'=>'complete here']);
    }
}