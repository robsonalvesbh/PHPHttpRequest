<?php

/**
 * Debug errors
 */
//ini_set('display_errors', 1);
//error_reporting(E_ALL);
echo '<pre>';

/**
 * Autoload
 */
require_once __DIR__ . '/../vendor/autoload.php';


/**
 * Http Request GET
 */

echo '<hr> Http Request GET <hr>';

$url = 'http://viacep.com.br/ws/01311200/json';
$header = [];

$requestGet = new PHPHttpRequest\Get($url, $header);
$response = $requestGet->send();

print_r($response);


/**
 * Http Request POST
 */


echo '<hr> Http Request POST <hr>';

$url = 'http://viacep.com.br/ws/01311200/json';
$header = [];
$data = [];

$requestGet = new PHPHttpRequest\Post($url, $header, $data);
$response = $requestGet->send();

print_r($response);