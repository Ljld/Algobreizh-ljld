<?php
  if(!isset($_SESSION)) 
  { 
      session_start(); 
  } 
  $this->title = "Nouvelle commande - Algobreizh";
?>

<div class="content">

  <h2 id="azert">Nouvelle Commande</h2>
  
  <section id="new-order-products-list">
    <?php foreach ($products as $product): ?>

    <div class="product-card">
      <form id="form-add-to-cart-_<?= $product['product_id'] ?>" class="add-to-cart-form" action="index.php?action=add-to-cart&product_id=<?= $product['product_id'] ?>"  method="post">
        <img class="product-icon" src="/content/pics/<?= $product['pic'] ?>.jpeg" alt="<?= $product['pic'] ?>">
        <p><?= $product['ref'] ?></p>
        <p>Prix : <?= $product['price'] ?>€</p>
        <div class="qte-line">
          <p class='qte-p'>Qté : </p> <input id="qty" name='qty' class="input-qty input-qty_<?= $product['product_id'] ?>" type="number" min="1" max="50">
        </div>
        
        <div class="add-btn-div">
          <button type='submit' class='button add-button'>Ajouter</button>
        </div>
      </form> 
    </div>

    

    <?php endforeach; ?>
  </section>

</div> <!-- #content -->
