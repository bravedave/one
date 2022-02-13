<?php
/*
 * David Bray
 * BrayWorth Pty Ltd
 * e. david@brayworth.com.au
 *
 * MIT License
 *
*/

abstract class currentUser {

  protected static $_dto = null;

  protected static $_user = '';

  protected static $_valid = false;

  static function destroy() {
    session_destroy();
  }

  static function init() {
    self::$_dto = new \dao\dto\users;

    session_start();
    if (isset($_SESSION['user'])) {
      self::$_user = $_SESSION['user'];
      self::$_valid = true;

      $dao = new dao\users;
      self::$_dto = $dao->getByID(self::$_user);
    }
  }

  static function name(): string {
    return self::$_dto->name;
  }

  static function isValid(): bool {
    return self::$_valid;
  }

  static function validate(string $user): void {
    $_SESSION['user'] = $user;
  }
}

currentUser::init();
