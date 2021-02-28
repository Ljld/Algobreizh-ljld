<?php

require_once 'View/View.php';
require_once 'Model/User.php';

class ClientAreaControler {

    //private $order;

    /*public function __construct() {
        $this->user = new User();
    }*/

    public function clientArea($email, $name) {
        $vue = new View("clientArea");
        $vue->generate(array('email' => $email, 'name' => $name));
    }

}
