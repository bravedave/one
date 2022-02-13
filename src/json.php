<?php
/*
 * David Bray
 * BrayWorth Pty Ltd
 * e. david@brayworth.com.au
 *
 * MIT License
 *
*/

use Fig\Http\Message\StatusCodeInterface as StatusCode;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Psr7\Factory\ResponseFactory;

class json {
  static protected function _Json(string $verb, string $action, array $data = []): Response {
    $responseFactory = new ResponseFactory;
    $response = $responseFactory->createResponse(StatusCode::STATUS_OK, $action);
    $response
      ->withHeader('content-type', 'application/json')
      ->getBody()->write(json_encode([
        'response' => $verb,
        'description' => $action,
        'data' => $data
      ]));

    return $response;
  }

  static function ack(string $action, array $data = []) {
    return self::_Json('ack', $action, $data);
  }

  static function nak(string $action, array $data = []) {
    return self::_Json('nak', $action, $data);
  }
}
