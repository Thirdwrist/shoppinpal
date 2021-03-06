<?php

namespace App\Tests;

use App\Nucleus\App;
use GuzzleHttp\Client;
use PHPUnit\Framework\TestCase;
use GuzzleHttp\Exception\ClientException;

class BookControllerTest extends TestCase
{
    /**
     * The Guzzle Http Client
     *
     * @var Client
     */
    protected $request;

    protected function setup()
    {
        $this->request = new Client([
            'base_uri'=>App::get('config')['APP_URL'],
            'exceptions'=>true, 
        ]);
    }

    /**
     * Test book creation endpoint
     *
     * @return void
     */
    public function testCreatedResponse()
    {   
        $data = [
            'title'=>'How to become a ShoppinPal Dev',
            'author'=>'Akunne Obinna',
            'isbn'=>1244333,
            'release_date'=>'2020-01-01'
        ];

        $res = $this->request->post('api/books', ['json'=> $data]);

        $body = json_decode($res->getBody(), true);
       
        $this->assertArrayHasKey('message', $body);
        $this->assertArrayHasKey('status', $body);
        $this->assertSame(201, $body['status']);
        $this->assertSame('Created book resource successfully', $body['message']);
        $this->assertSame(201, $res->getStatusCode());
    }

    /**
     * Test book creation endpoint validation
     *
     * @return void
     */
    public function testValidationErrorResponse()
    {
        $data = [
            'author'=>11234,
            'release_date'=>'2020-01-01'
        ];

        try{
            $this->request->post('api/books', ['json'=> $data]);
        }catch(ClientException $ex){
        
            $body = json_decode($ex->getResponse()->getBody(), true);

            $this->assertArrayHasKey('message', $body);
            $this->assertArrayHasKey('status', $body);
            $this->assertArrayHasKey('errors', $body);
            $this->assertSame(400, $body['status']);
            $this->assertSame(400, $ex->getCode());
            $this->assertSame('Validation error', $body['message']);
            $this->assertArrayHasKey('title', $body['errors']);
            $this->assertArrayHasKey('author', $body['errors']);
            $this->assertArrayHasKey('isbn', $body['errors']);
        }
    }

    /**
     * Test fetching all books endpoint
     *
     * @return void
     */
    public function testGetAllBooksResponse()
    {
        $res = $this->request->get('api/books');

        $body = json_decode($res->getBody(), true);

        $this->assertArrayHasKey('message', $body);
        $this->assertArrayHasKey('status', $body);
        $this->assertArrayHasKey('data', $body);
        $this->assertSame(200, $body['status']);
        $this->assertSame('Fetched all books', $body['message']);
        $this->assertSame(200, $res->getStatusCode());
    }

    /**
     * Test OpenAPI docs endpoint
     *
     * @return void
     */
    public function testDocumentationJson()
    {
         $res = $this->request->get('api/docs/json');

        $body = json_decode($res->getBody(), true);

        $this->assertArrayHasKey('openapi', $body);
        $this->assertArrayHasKey('paths', $body);
        $this->assertArrayHasKey('info', $body);
    }
}