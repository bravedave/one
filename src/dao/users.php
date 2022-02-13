<?php
/*
 * David Bray
 * BrayWorth Pty Ltd
 * e. david@brayworth.com.au
 *
 * MIT License
 *
*/

namespace dao;

class users {
  private $_users = null;

  public function __construct() {
    $dto = new dto\users;
    $dto->id = 1;
    $dto->username = 'root';
    $dto->name = 'root';
    $dto->pass = password_hash('toor', PASSWORD_DEFAULT);

    $this->_users = [$dto];
  }

  public function getAll(): array {
    return $this->_users;
  }

  public function getByID(int $id): dto\users {
    if (1 == $id) {
      $dto = $this->_users[0];

      return $dto;
    }

    return new dto\users;
  }
}
