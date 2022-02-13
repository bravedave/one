<?php
/*
 * David Bray
 * BrayWorth Pty Ltd
 * e. david@brayworth.com.au
 *
 * MIT License
 *
*/

// load the autoloader
if (preg_match('/\.(?:png|ico|jpg|jpeg|gif|css|js)$/', $_SERVER['REQUEST_URI'])) {
  if (file_exists(trim($_SERVER['REQUEST_URI'], ' /\\')))
    return false;    // serve the requested resource as-is.

}

require __DIR__ . '/../vendor/autoload.php';

// run the application
application::run();
