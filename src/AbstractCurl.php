<?php

namespace PHPHttpRequest;

class AbstractCurl
{
    private $curl;

    public function __construct($url, Array $headers = null, Array $data = null)
    {
        $this->setCurlInit();

        $this->setUrl($url);

        $this->setHeaders($headers);

        $this->setData($data);

        $this->curlSettings();
    }

    public function __destruct()
    {
        $this->finishCurl();
    }

    private function setCurlInit()
    {
        $this->curl = curl_init();
    }

    private function setUrl($url)
    {
        if (!filter_var($url, FILTER_VALIDATE_URL)) {
            throw new \Exception('A URL informada não é valida');
        }

        curl_setopt($this->curl, CURLOPT_URL, $url);
    }

    private function setHeaders($headers)
    {
        if (is_null($headers)) {
            return;
        }

        curl_setopt($this->curl, CURLOPT_HTTPHEADER, $headers);
    }

    private function setData($data)
    {
        if (is_null($data)) {
            return;
        }

        curl_setopt($this->curl, CURLOPT_POST, true);
        curl_setopt($this->curl, CURLOPT_POSTFIELDS, json_encode($data));
    }

    private function curlSettings()
    {
        curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($this->curl, CURLOPT_FOLLOWLOCATION, true);
    }

    protected function execute()
    {
        return curl_exec($this->curl);
    }

    private function finishCurl()
    {
        curl_close($this->curl);
    }

    protected function returnoRequest($response)
    {
        return json_decode($response);
    }
}
