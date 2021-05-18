<?php
  $this->title = "Clients - Algobreizh";
?>

<div class="content">

  <a href="index.php?action=new-customer"><button class="button">Ajouter un client</button></a>
  

  <section class="order-infos">


    <table id="customer-list">
      <tr>
        <th>ID Client</th>
        <th>Nom</th>
        <th>Email</th>
        <th>Modifier / Supprimer</th>
      </tr>

      <?php foreach ($customers as $customer): ?>

        <tr>
          <td><?= $customer['user_id'] ?></td>
          <td><?= $customer['civility'] .' '. $customer['name'] .' '. $customer['surname']?></td>
          <td><?= $customer['email'] ?></td>
          <td>
            <a href="index.php?action=modify-customer&user_id=<?= $customer['user_id'] ?>"><button class='button'>Modifier</button></a>
            <a href="index.php?action=delete-customer&user_id=<?= $customer['user_id'] ?>"><button class='button'>Supprimer</button></a>
          </td>
        </tr>
      <?php endforeach; ?>
    </table>
  </section>

</div>