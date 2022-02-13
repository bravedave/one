<?php
/*
 * David Bray
 * BrayWorth Pty Ltd
 * e. david@brayworth.com.au
 *
 * MIT License
 *
*/

namespace home;

use Psr\Http\Message\{
  ResponseInterface as Response,
  ServerRequestInterface as Request
};

class controller extends \controller {
  protected $views = __DIR__ . '/views';

  public function home(Request $request, Response $response, array $args): Response {
    $args['view'] = 'casa.php';
    return $this->_render($request, $response, $args);
  }
}
