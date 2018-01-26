<?php

namespace PHPHttpRequest;

class GetRequestTest extends \PHPUnit_Framework_TestCase
{
    public function testGetRequest()
    {
        $url = 'http://viacep.com.br/ws/01311200/json';
        $header = [];

        $requestGet = new Get($url, $header);
        $response = $requestGet->send();

        $this->assertEquals('3550308', $response->ibge);
    }
}
