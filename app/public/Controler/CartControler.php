<?php

require_once 'View/View.php';
require_once 'Model/Cart.php';
require_once 'Model/User.php';

class CartControler {

    private $cart;
    private $user;

    public function __construct() {
        $this->cart = new Cart();
        $this->user = new User();
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
            $_SESSION['cart_total_price'] = 0;
        }
        
    }

    public function cart() {
        $vue = new View("cart");
        $exp_adresses = $this->user->getUserAdresses($_SESSION['email']);
        $bill_adresses = $this->user->getUserAdresses($_SESSION['email']);

        $vue->generate(array('cart' => $_SESSION['cart'], 'cart_total_price' => $_SESSION['cart_total_price'], 'exp_adresses' => $exp_adresses, 'bill_adresses' => $bill_adresses));
    }

    public function sendOrder($exp, $bill) {
        $user_id = $this->cart->getUserID($_SESSION['email']);
        if (isset($_SESSION['cart'])) {
            if (!empty($_SESSION['cart'])) {
                $this->cart->sendOrder($_SESSION['cart'], $user_id, $_SESSION['cart_total_price'], $exp, $bill);
            } 
        }
        unset($_SESSION['cart']);
        unset($_SESSION['cart_total_price']);
        $vue = new View("orderOK");
        $vue->generate(array());
    }

    public function deleteLine($product_id) {
        $_SESSION['cart_total_price'] -= $_SESSION['cart'][$product_id]['total'];
        unset($_SESSION['cart'][$product_id]);
        $this->cart();
    }

    public function addToCart($product_id, $qty) {
        $ref = $this->cart->getProductRef($product_id);
        $price = $this->cart->getProductPrice($product_id);
        if (!isset($_SESSION['cart'][$product_id])) {
            $_SESSION['cart'][$product_id] = array();
            $_SESSION['cart'][$product_id]['id'] = $product_id;
            $_SESSION['cart'][$product_id]['ref'] = $ref;
            $_SESSION['cart'][$product_id]['qty'] = $qty;
            $_SESSION['cart'][$product_id]['price'] = $price;
            $_SESSION['cart'][$product_id]['total'] = $price * $qty;

            $_SESSION['cart_total_price'] += $_SESSION['cart'][$product_id]['total'];
        }
        else {
            $old_qty = $_SESSION['cart'][$product_id]['qty'];
            unset($_SESSION['cart'][$product_id]['qty']);
            $_SESSION['cart'][$product_id]['qty'] = $qty + $old_qty;
            $_SESSION['cart'][$product_id]['total'] += $price * $qty;

            $_SESSION['cart_total_price'] += $price * $qty;
            session_write_close();
        }
        //$_SESSION['cart'][$product_id] = array();
        

        //$json = array('error' => true);
        //$json['error'] = false;
        
        $json['msg'] = "Produit(s) ajouté(s) ! \n {$ref} X{$qty}";

        echo json_encode($json);
        //echo $_SESSION['cart'];
        //var_dump($_SESSION);
  
      }

}
