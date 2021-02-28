<?php
  if(!isset($_SESSION)) 
  { 
      session_start(); 
  } 
  $this->title = "Nouvelle commande - Algobreizh";
?>

<div class="content">

  <h2 id="azert">Nouvelle Commande</h2>

  <table id="new-order-products-table">
    <thead>
      <th>Produits</th>
      <th>Quantité</th>
      <th>Prix (€/kg)</th>
      <th></th>
    </thead>
    <tbody>
      <?php foreach ($products as $product): ?>

        <tr class="product-row" id="<?= $product['product_id'] ?>">
          <td id="<?= $product['product_id']."-Ref" ?>"><?= $product['ref'] ?></td>
          <td id="<?= $product['product_id']."-Quantity" ?>"> <input type="text" size="3" name="" value=""> </td>
          <td id="<?= $product['product_id']."-Price" ?>"><?= $product['price'] ?></td>
          <td> <button class="button add-button" type="button" name="button">Ajouter</button> </td>
        </tr>

      <?php endforeach; ?>
    </tbody>
  </table>


</div> <!-- #content -->
