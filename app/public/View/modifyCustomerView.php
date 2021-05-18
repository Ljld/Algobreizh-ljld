<?php
  $this->title = "Modifier - Algobreizh";
?>

<div class="content">

    <form action="index.php?action=update-email&user_id=<?= $user_id ?>" method="post">
        <label for="newEmail">Nouvel Email</label>
        <input type="text" class="input-email" name="newEmail" id="newEmail" value="" placeholder="Nouvel Email" required/>
        <input class="button" type="submit" value="Valider">
    </form>

  


</div>