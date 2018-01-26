<?php

namespace PHPHttpRequest;


class Get extends AbstractCurl implements RequestInterface
{
    public function __construct($url, Array $headers = null)
    {
        parent::__construct($url, $headers);
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