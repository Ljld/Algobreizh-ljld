<?php

require_once 'Model/Model.php';

class Cart extends Model {

    public function getProductRef($product_id) {
        $sql = "SELECT ref FROM products WHERE product_id = {$product_id}";
        $ref = $this->executeRequest($sql);
        $ref = $ref->fetch();
        return $ref['ref'];
    }

    public function getUserID($email) {
        $sql = "SELECT user_id FROM users WHERE email = '{$email}'";
        $user_id = $this->executeRequest($sql);
        $user_id = $user_id->fetch();
        return $user_id['user_id'];
      }

    public function getProductPrice($product_id) {
        $sql = "SELECT price FROM products WHERE product_id = {$product_id}";
        $price = $this->executeRequest($sql);
        $price = $price->fetch();
        return $price['price'];
    }

    public function sendOrder($cart, $user_id, $total_price, $exp, $bill) {
        $sql = "INSERT INTO orders (user_id, total_price, billing_adress_id, expedition_adress_id) 
        VALUES ({$user_id}, {$total_price}, {$bill}, {$exp})";
        $order = $this->executeRequest($sql);


        foreach ($cart as $line) {
            $sql = "INSERT INTO order_items (order_id, product_id, quantity) " .
                    "VALUES (LAST_INSERT_ID(), {$line['id']}, {$line['qty']})";

            $line_sql = $this->executeRequest($sql);
        }
    }

}
