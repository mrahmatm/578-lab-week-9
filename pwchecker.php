<?php

$client = new http\Client;
$request = new http\Client\Request;

$body = new http\Message\Body;
$body->append('{
    "password": "meow"
}');

$request->setRequestUrl('https://strong-password-generator-and-checker.p.rapidapi.com/api/password_check');
$request->setRequestMethod('POST');
$request->setBody($body);

$request->setHeaders([
	'content-type' => 'application/json',
	'X-RapidAPI-Key' => '33f24f2013msh95f42adde4ca520p1d45e6jsn2b536a922f4e',
	'X-RapidAPI-Host' => 'strong-password-generator-and-checker.p.rapidapi.com'
]);

$client->enqueue($request)->send();
$response = $client->getResponse();

echo $response->getBody();
?>