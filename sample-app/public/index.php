<?php

declare(strict_types=1);

use DI\Container;
use Slim\Factory\AppFactory;
use Slim\Views\Twig;
use Slim\Views\TwigMiddleware;

require __DIR__ . '/../vendor/autoload.php';

// Load environment variables
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->safeLoad();

// Create container
$container = new Container();
AppFactory::setContainer($container);

// Create app
$app = AppFactory::create();

// Add Twig
$container->set(Twig::class, function () {
    return Twig::create(__DIR__ . '/../templates', ['cache' => false]);
});
$app->add(TwigMiddleware::createFromContainer($app, Twig::class));

// Add error middleware
$app->addErrorMiddleware(true, true, true);

// Parse JSON body
$app->addBodyParsingMiddleware();

// Routes
$app->get('/', \App\Controllers\HomeController::class . ':index');
$app->post('/screenshot', \App\Controllers\ScreenshotController::class . ':capture');

$app->run();
