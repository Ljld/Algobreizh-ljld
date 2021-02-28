<?php

require_once 'View/View.php';
require_once 'Model/Order.php';
require_once 'Model/User.php';

class OrderControler {

    private $order;
    private $user;

    public function __construct() {
        $this->order = new Order();
        $this->user = new User();
    }


    public function order($order_id) {
      $vue = new View("order");
      $current_order = $this->order->getOrderInfos($order_id);
      $current_order['exp_adress'] = $this->order->getAdress($current_order['expedition_adress_id']);
      $current_order['billing_adress'] = $this->order->getAdress($current_order['billing_adress_id']);
      $products = $this->order->getOrderProducts($order_id);

      $vue->generate(array('order' => $current_order, 'products' => $products));
    }

    public function orderList($email) {
      $vue = new View("orderList");
      $orders = $this->order->getOrders($this->user->getUserID($email));
      $vue->generate(array('orders' => $orders, 'orderType' => 'Commande'));
    }

    public function billList($email) {
      $vue = new View("orderList");
      $orders = $this->order->getBills($this->user->getUserID($email));
      $vue->generate(array('orders' => $orders, 'orderType' => 'Facture'));
    }

    public function newOrder() {
      $vue = new View("newOrder");
      $products = $this->order->getAllProducts();
      $vue->generate(array('products' => $products));

    }

}
