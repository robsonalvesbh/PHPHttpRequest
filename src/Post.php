<?php

namespace PHPHttpRequest;


class Post extends AbstractCurl implements RequestInterface
{
    public function __construct($url, Array $headers = null, Array $data = null)
    {
        parent::__construct($url, $headers, $data);
    }

    public function send()
    {
        try {

            $output = $this->execute();
            return $this->returnoRequest($output);

        } catch (\Exception $e) {
            return $this->returnoRequest([
                'error' => $e->getMessage(),
            ]);

        }
    }
}