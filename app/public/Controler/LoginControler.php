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
        if ($this->user->getUserType($email) == 'customer') {
          $this->clientAreaCtrl->clientArea($email, $this->user->getName($email));
        }
        else {
          $this->clientAreaCtrl->adminArea($email);
        }
      }
      else {
        echo 'INCORRECT !';
      }

    }
}
