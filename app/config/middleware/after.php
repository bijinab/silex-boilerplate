<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

// Cors
$app->after(function (Request $request, Response $response) {
    $response->headers->set('Access-Control-Allow-Origin', 'http://localhost:8001');
    $response->headers->set('Access-Control-Allow-Methods', array('GET', 'POST', 'DELETE', 'PUT', 'OPTIONS'));
    $response->headers->set('Access-Control-Allow-Headers', array('Authorization', 'Content-Type', 'Accept'));
    $response->headers->set('Access-Control-Allow-Credentials', 'true');
});