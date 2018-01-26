<?php

namespace PHPHttpRequest;

class PostRequestTest extends \PHPUnit_Framework_TestCase
{
    public function testGetRequest()
    {
        $url = 'http://viacep.com.br/ws/01311200/json';
        $header = [];
        $data = [];

        $requestGet = new Post($url, $header, $data);
        $response = $requestGet->send();

        $this->assertEquals('3550308', $response->ibge);
    }
}
