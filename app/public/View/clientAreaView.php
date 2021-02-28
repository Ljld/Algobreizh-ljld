<?php
  if(!isset($_SESSION)) 
  { 
      session_start(); 
  } 
  $this->title = "Espace client - Algobreizh";
  if (!(isset($_SESSION['name']))) {
    $_SESSION['name'] = $name;
    $_SESSION['email'] = $email;
  }
  $_SESSION['isLoggedIn'] = true;

?>

<div class="content">


  <h1>Bonjour, <?= $_SESSION['name']; ?></h1>

  <menu>
    <button class="button" type="button" name="button" > <a href="index.php?action=order-list">Mes Commandes</a> </button>
    <button class="button" type="button" name="button" > <a href="index.php?action=bill-list">Mes Factures</a> </button>
    <button class="button" type="button" name="button" > <a href="index.php?action=new-order">+ Nouvelle Commande</a> </button>
    <button class="button" type="button" name="logOutBtn" id="logOutBtn" > <a href="index.php?action=logout">Déconnexion</a> </button>
  </menu>



</div> <!-- #content -->
