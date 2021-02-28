<?php $this->title = "Connexion - Algobreizh"; ?>

<div class="content">

  <form id="login-form" class="login-form" action="index.php?action=valid-login" method="post">
    <h1>Connexion</h1>
    <div class="form-container">

      <div class="label-div">
        <label for="email">Email : </label>
        <label for="password">Mot de passe : </label>
      </div>

      <div class="input-div">
        <input type="text" class="input input-blank" name="email" id="email" value="" placeholder="Votre email" required/>
        <input type="password" class="input input-blank" name="password" id="password" value="" placeholder="Votre mot de passe" minlength="5" maxlength="50" required/>

      </div>

    </div> <!-- form-container -->

    <button type="submit" id="login-submit" name="login-submit" class="button button-full">Valider</button>

  </form>

</div> <!-- #content -->
