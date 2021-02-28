<?php

require_once 'View/View.php';
require_once 'Model/User.php';
require_once 'Controler/ClientAreaControler.php';

class LoginControler {

    private $user;
    private $clientAreaCtrl;

    public function __construct() {
        $this->user = new User();
        $this->clientAreaCtrl = new ClientAreaControler();
    }

    public function login() {
        $vue = new View("login");
        $vue->generate(array());
    }

    public function checkPassword($email, $password) {
      $hash = $this->user->getUserHash($email);
      if (password_verify($password, $hash)) {
        $this->clientAreaCtrl->clientArea($email, $this->user->getName($email));
      }
      else {
        echo 'INCORRECT !';
      }

    }

    /*public function validSignUp($username, $email, $password) {
      $vue = new View("validSignUp");
      $vue->generate(array('username' => $username, 'email' => $email, 'password' => $password));
      $this->user->createUser($username, $email, $password);
    }*/


}
