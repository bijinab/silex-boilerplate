<?php
/**
 * Register services here.
 */

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

// config service

$app->register(new Igorw\Silex\ConfigServiceProvider(__DIR__ . "/settings/dev.php"));
// $app->register(new Igorw\Silex\ConfigServiceProvider(__DIR__ . "/settings/_default.php"));

$envConfig = __DIR__ . "/settings/{$app['api.environment']}.php";
if (file_exists($envConfig)) {
    $app->register(new Igorw\Silex\ConfigServiceProvider($envConfig));
}

// DB
$app->register(new Silex\Provider\DoctrineServiceProvider(), array(
    'db.options' => array(
        'driver' => 'pdo_mysql',
        'dbname' => 'silex',
        'host' => 'localhost',
        'port' => 3306,
        'username' => 'root',
        'password' => 'root'
    )
));
