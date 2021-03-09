<?php

require_once 'Model/Model.php';

class Order extends Model {

    /** Renvoie la liste des billets du blog
     *
     * @return PDOStatement La liste des billets
     */

    public function createOrder($user_id) {
        $sql = "INSERT INTO orders (user_id, surname, civility, email, password, userType)"
        . " values ('{$name}','{$surname}','{$civility}','{$email}', '{$password}', 'customer')";

        $user = $this->executeRequest($sql);
        /*
        if ($billet->rowCount() > 0)
            return $billet->fetch();  // Accès à la première ligne de résultat
        else
            throw new Exception("Aucun billet ne correspond à l'identifiant '$idBillet'");*/
    }

    public function getOrders($user_id) {
      $sql = "SELECT order_id, confirm_date FROM orders WHERE user_id = '{$user_id}' and status = 'pending'";
      $orders = $this->executeRequest($sql);
      return $orders;
    }

    public function sendOrder($order_id) {
      $sql = "UPDATE orders 
              SET status = 'done',
                  expedition_date = NOW()
              WHERE order_id = {$order_id}";
      $user = $this->executeRequest($sql);
    }

    public function getPendingOrders() {
      $sql = "SELECT order_id, confirm_date FROM orders WHERE status = 'pending'";
      $orders = $this->executeRequest($sql);
      return $orders;
    }

    public function getBills($user_id) {
      $sql = "SELECT order_id, confirm_date FROM orders WHERE user_id = '{$user_id}' and status = 'done'";
      $orders = $this->executeRequest($sql);
      return $orders;
    }

    public function getOrderInfos($order_id) {
      $sql = "SELECT o.order_id,
              	users.civility, users.name, users.surname,
              	o.confirm_date, o.expedition_date,
              	o.expedition_adress_id, o.billing_adress_id, o.total_price
              FROM orders as o
              INNER JOIN users ON o.user_id = users.user_id
              WHERE order_id = {$order_id}";

      $order_infos = $this->executeRequest($sql);

      if ($order_infos->rowCount() > 0) {
        return $order_infos->fetch();  // Accès à la première ligne de résultat
      }

      else {
        throw new Exception("Aucune commande ne correspond à l'identifiant '$order_id'");
      }
    }

    public function getAdress($adress_id) {
      $sql = "SELECT *
              FROM adresses
              WHERE adress_id = {$adress_id}";

      $adress_infos = $this->executeRequest($sql);

      if ($adress_infos->rowCount() > 0) {
        return $adress_infos->fetch();  // Accès à la première ligne de résultat
      }

      else {
        throw new Exception("Aucune adresse ne correspond à l'identifiant {$adress_id}");
      }
    }

    public function getOrderProducts($order_id) {
      $sql = "SELECT p.ref, p.price, order_items.quantity
              FROM products as p
                INNER JOIN order_items ON p.product_id = order_items.product_id
              WHERE order_id = {$order_id}";

      $order_products = $this->executeRequest($sql);

      if ($order_products->rowCount() > 0) {
        return $order_products;
      }

      else {
        throw new Exception("Aucun produit ne correspond à la commande '$order_id'");
      }
    }

    public function getAllProducts() {
      $sql = "SELECT *
              FROM products as p";

      $product_list = $this->executeRequest($sql);

      return $product_list;
    }

    public function getOrderID($order_id) {
      $sql = "SELECT order_id, confirm_date FROM orders WHERE order_id = '{$order_id}'";
      $name = $this->executeRequest($sql);
      $name = $name->fetch();
      return $name['name'];
    }

    /*public function getname($email) {
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
    }*/

}
