<?php
  if(!isset($_SESSION)) 
  { 
      session_start(); 
  } 
  $this->title = "Commande 1564 - Algobreizh";
?>

<div class="content">

  <h2>Commande n°<?= $order['order_id'] ?></h2>

  <section class="order-infos">
    <table id="order-info">
      <tr>
        <th>Client</th>
        <td> <?= $order['name']." ". $order['surname'] ?> </td>
      </tr>
      <tr>
        <th>Date de confirmation</th>
        <td><?= $order['confirm_date'] ?></td>
      </tr>
      <tr>
        <?php
          if (!is_null($order['expedition_date'])) {
        ?>
            <th>Date d'expédition</th>
            <td><?= $order['expedition_date'] ?></td>
        <?php
          }
        ?>

      </tr>
    </table>
  </section>

  <hr class="order-hr">

  <section class="adresses">
    <table id="billing-adress">
      <thead>
        <th>Facturation</th>
      </thead>
      <tr>
        <td><?= $order['civility']." ". $order['name']." ".$order['surname'] ?></td>
      </tr>
      <tr>
        <td><?= $order['billing_adress']['street'] ?></td>
      </tr>
      <tr>
        <td><?= $order['billing_adress']['zip']." ".$order['billing_adress']['city'].", ".$order['billing_adress']['country'] ?></td>
      </tr>

    </table>

    <table id="expedition-adress">
      <thead>
        <th>Expédition</th>
      </thead>
      <tr>
        <td><?= $order['civility']." ". $order['name']." ".$order['surname'] ?></td>
      </tr>
      <tr>
        <td><?= $order['exp_adress']['street'] ?></td>
      </tr>
      <tr>
        <td><?= $order['exp_adress']['zip']." ".$order['exp_adress']['city'].", ".$order['exp_adress']['country'] ?></td>
      </tr>


    </table>
  </section>

  <hr class="order-hr">

  <section class="products-section">
    <table>
      <thead>
        <tr>
          <th colspan="4" id="product_table_head">Produits</th>
        </tr>
        <tr>
          <th>Type</th>
          <th>Quantité</th>
          <th>Prix (€ / kg)</th>
          <th><strong>Total</strong></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($products as $product): ?>

          <tr class="product-rows">
            <td><?= $product['ref'] ?></td>
            <td><?= $product['quantity'] ?></td>
            <td><?= $product['price'] ?></td>
            <td><?= $product['quantity'] * $product['price'] ?>€</td>
          </tr>

        <?php endforeach; ?>

        <tr>
          <th>Total</th>
          <td>-</td>
          <td>-</td>
          <td><?= $order['total_price'] ?>€</td>
        </tr>

      </tbody>

    </table>
  </section>






</div> <!-- #content -->
