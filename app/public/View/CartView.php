<?php
  if(!isset($_SESSION)) 
  { 
      session_start(); 
  } 
  $this->title = "Panier - Algobreizh";
?>

<div class="content">

  <h2>Votre panier</h2>

  <section id="cart-products" class="products-section">
    <table>
      <thead>
        <tr>
          <th>Type</th>
          <th>Quantité</th>
          <th>Prix (€ / kg)</th>
          <th><strong>Total</strong></th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($cart as $product): ?>

          <tr class="product-rows">
            <td><?= $product['ref'] ?></td>
            <td><?= $product['qty'] ?></td>
            <td><?= $product['price'] ?></td>
            <td><?= $product['total'] ?>€</td>
            <td><a href="index.php?action=delete-line&product_id=<?= $product['id'] ?>"><button class='button delete-btn'>Supprimer</button></a></td>
          </tr>

        <?php endforeach; ?>

        <tr>
          <th>Total</th>
          <td>-</td>
          <td>-</td>
          <td><?= $cart_total_price ?>€</td>
        </tr>

      </tbody>

    </table>
    
  </section>

  <form id="adresses-form" action="index.php?action=send-order" method="post">
    <div class='adresses-selects'>
      <h3>Expédition</h3>
      <select name="exp-add" id="exp-add">
        <?php foreach ($exp_adresses as $adress): ?>

          <option value="<?= $adress['adress_id'] ?>"><?= $adress['city'] ?>,<?= $adress['street'] ?></option>

        <?php endforeach; ?>
      </select>
      <h3>Facturation</h3>
      <select name="bill-add" id="bill-add">
        <?php foreach ($bill_adresses as $adress): ?>

          <option value="<?= $adress['adress_id'] ?>"><?= $adress['city'] ?>,<?= $adress['street'] ?></option>

        <?php endforeach; ?>
      </select>
    </div>
    
    <button type='submit' class='button valid-btn'>Valider la commande</button>
  </form>

  

  

</div> <!-- #content -->
