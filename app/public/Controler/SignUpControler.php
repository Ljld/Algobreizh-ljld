<?php

require_once 'View/View.php';
require_once 'Model/User.php';

class SignUpControler {

    private $user;

    public function __construct() {
        $this->user = new User();
    }

    public function signUp() {
        $vue = new View("signUp");
        $vue->generate(array());
    }

    public function validSignUp($name, $surname, $civility, $email, $password) {
      $vue = new View("validSignUp");
      $vue->generate(array('name' => $name, 'surname' => $surname, 'civility' => $civility, 'email' => $email, 'password' => $password));
      $this->user->createUser($name, $surname, $civility, $email, $password);
    }

    public function createUser($name, $surname, $civility, $email, $password) {
      $this->user->createUser($name, $surname, $civility, $email, $password);
    }

}
