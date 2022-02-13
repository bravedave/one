<?php
/*
 * David Bray
 * BrayWorth Pty Ltd
 * e. david@brayworth.com.au
 *
 * MIT License
 *
*/

use Slim\Views\PhpRenderer;

class view extends PhpRenderer {

  function __construct(string $path = __DIR__ . '/views', array $attributes = []) {
    parent::__construct($path, $attributes);
  }
}
