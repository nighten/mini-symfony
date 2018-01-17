<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Debug\Debug;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\HttpKernel\HttpKernel;
use Symfony\Component\HttpKernel\Controller\ControllerResolver;

$loader = require __DIR__.'/vendor/autoload.php';
Debug::enable();
$request = Request::createFromGlobals();
$dispatcher = new EventDispatcher();
$resolver = new ControllerResolver();
$kernel = new HttpKernel($dispatcher, $resolver);
$response = $kernel->handle($request);
$response->send();
$kernel->terminate($request, $response);
