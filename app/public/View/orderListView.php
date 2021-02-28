<?php
  if(!isset($_SESSION)) 
  { 
      session_start(); 
  } 
  $this->title = "Vos {$orderType}s - Algobreizh";
?>

<div class="content">

  <h2 id="orderListH2">Vos <?= $orderType ?>s</h2>

  <ul class="order-list">
    <!-- <li> <a href="#">Commande #64512</a> </li>
    <li> <a href="#">Commande #62456</a> </li> -->

    <?php foreach ($orders as $order): ?>

      <li> <a href="index.php?action=order&order_id=<?= $order['order_id'] ?>"><?= $orderType ?> #<?= $order['order_id'] ?></a> </li>

    <?php endforeach; ?>

  </ul>


</div> <!-- #content -->
