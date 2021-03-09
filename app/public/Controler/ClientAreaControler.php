<?php

require_once 'View/View.php';
require_once 'Model/User.php';
require_once 'Model/Order.php';

class ClientAreaControler {

    private $order;
    

    public function __construct() {
        $this->user = new User();
        $this->order = new Order();
    }

    public function clientArea($email, $name) {
        $vue = new View("clientArea");
        $vue->generate(array('email' => $email, 'name' => $name));
    }

    public function adminArea($email) {
        $vue = new View("adminArea");
        $orders = $this->order->getPendingOrders();
        $vue->generate(array('orders' => $orders, 'email' => $email));
    }

}
