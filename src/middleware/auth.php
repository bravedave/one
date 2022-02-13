<?php
/*
 * David Bray
 * BrayWorth Pty Ltd
 * e. david@brayworth.com.au
 *
 * MIT License
 *
*/

namespace middleware;

use currentUser, json, view;
use Fig\Http\Message\StatusCodeInterface as StatusCode;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;
use Slim\Psr7\Factory\ResponseFactory;

class auth {
  // $beforeMiddleware = function (Request $request, RequestHandler $handler) {
  public function __invoke(Request $request, RequestHandler $handler): Response {
    if (currentUser::isValid()) return $handler->handle($request);

    if ('POST' == $request->getMethod()) {
      $params = (array)$request->getParsedBody();
      $action = $params['action'] ?? '';

      if ($action) {
        if ('logon' == $action) {
          if (($user = ($params['user'] ?? '')) && ($pass = ($params['pass'] ?? ''))) {
            if ($this->_check($user, $pass)) {
              return json::ack($action);
            }
          }
        }
      }
      return json::nak($action);
    }

    $responseFactory = new ResponseFactory;
    $response = $responseFactory->createResponse(StatusCode::STATUS_OK, 'Please Logon');

    $v = new view(__DIR__ . '/views');
    $v->setLayout('_layout_.php');
    return $v->render($response, 'logon.php', ['title' => 'Logon']);

    return $response;
  }

  protected function _check(string $user, string $pass) {
    $dao = new \dao\users;
    $users = $dao->getAll();
    foreach ($users as $_user) {
      if ($user == $_user->username && password_verify($pass, $_user->pass)) {
        currentUser::validate($_user->id);
        return true;
      }
    }
    return false;
  }
}
