<?php

require_once 'Model/Model.php';

class User extends Model {

    public function createUser($name, $surname, $civility, $email, $password) {
        $sql = "INSERT INTO users (name, surname, civility, email, password, userType)"
        . " values ('{$name}','{$surname}','{$civility}','{$email}', '{$password}', 'customer')";

        $user = $this->executeRequest($sql);
    }

    public function getname($email) {
      $sql = "SELECT name FROM users WHERE email = '{$email}'";
      $name = $this->executeRequest($sql);
      $name = $name->fetch();
      return $name['name'];
    }

    public function getUserHash($email) {
      $sql = "SELECT password FROM users WHERE email = '{$email}'";
      $hash = $this->executeRequest($sql);
      $hash = $hash->fetch();
      return $hash['password'];
    }

    public function getUserType($email) {
      $sql = "SELECT userType FROM users WHERE email = '{$email}'";
      $type = $this->executeRequest($sql);
      $type = $type->fetch();
      return $type['userType'];
    }

    public function getUserID($email) {
      $sql = "SELECT user_id FROM users WHERE email = '{$email}'";
      $user_id = $this->executeRequest($sql);
      $user_id = $user_id->fetch();
      return $user_id['user_id'];
    }

    public function getUserAdresses($email) {
      $user_id = $this->getUserID($email);
      $sql = "SELECT *
              FROM adresses
              WHERE user_id = {$user_id}";

      $user_adresses = $this->executeRequest($sql);

      return $user_adresses;
    }

}
