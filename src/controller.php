<?php
/*
 * David Bray
 * BrayWorth Pty Ltd
 * e. david@brayworth.com.au
 *
 * MIT License
 *
*/

use Psr\Http\Message\{
  ResponseInterface as Response,
  ServerRequestInterface as Request
};

class controller {
  protected $views = __DIR__ . '/views';

  protected function _render(Request $request, Response $response, array $args): Response {

    $view = strings::getRelativePath($this->views, __DIR__ . '/views/home.php');

    $args = array_merge([
      'title' => 'Home',
      'navbar' => strings::getRelativePath($this->views, __DIR__ . '/views/navbar.php'),
      'aside' => strings::getRelativePath($this->views, __DIR__ . '/views/aside.php'),
      'footer' => strings::getRelativePath($this->views, __DIR__ . '/views/footer.php'),
      'view' => $view
    ], $args);

    $renderer = $this->_renderer();
    return $renderer->render($response, $args['view'], $args);
  }

  protected function _renderer(): view {

    $template = strings::getRelativePath($this->views, __DIR__ . '/views/_layout_.php');

    $v = new view($this->views);
    $v->setLayout($template);

    return $v;
  }

  public function postHandler(Request $request, Response $response, array $args): Response {
    $params = (array)$request->getParsedBody();
    $action = $params['action'] ?? '';

    if ($action) return json::nak($action);

    return json::nak('unknown');
  }
}
