<?php

/**
 * David Bray
 * BrayWorth Pty Ltd
 * e. david@brayworth.com.au
 *
 * MIT License
 *
 */

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Factory\AppFactory;

class application {

  static function run(): void {
    $app = AppFactory::create();

    $app->add(middleware\auth::class);

    $app->get('/', home\controller::class . ':home')
      ->setName('home');

    $app->get('/logout', function (Request $request, Response $response, $args) {
      currentUser::destroy();
      $response
        ->withHeader('Location', '/')
        ->withStatus(302);
      return $response;
    });

    $app->run();
  }
}
