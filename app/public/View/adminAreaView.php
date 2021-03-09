<?php
  if(!isset($_SESSION)) 
  { 
      session_start(); 
  } 
  $this->title = "Espace admin - Algobreizh";
  if (!(isset($_SESSION['name']))) {
    $_SESSION['name'] = 'Admin';
    $_SESSION['email'] = $email;
  }
  $_SESSION['isLoggedIn'] = true;

?>

<div class="content">


  <h1>Commandes à valider</h1>

  <ul class="order-list">
    <!-- <li> <a href="#">Commande #64512</a> </li>
    <li> <a href="#">Commande #62456</a> </li> -->

    <?php foreach ($orders as $order): ?>

      <li> <a href="index.php?action=order&order_id=<?= $order['order_id'] ?>">Commande #<?= $order['order_id'] ?></a> </li>

    <?php endforeach; ?>

  </ul>



</div> <!-- #content -->
