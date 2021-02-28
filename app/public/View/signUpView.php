<?php $this->title = "Inscription - Algobreizh"; ?>

<div class="content">

  <form id="sign-up-form" class="sign-up-form" action="index.php?action=valid-sign-up" method="post">
    <h1>Inscrivez-vous</h1>
    <div class="form-container">

      <div class="label-div">
        <label for="civility">Civilité : </label>
        <label for="surname">Nom : </label>
        <label for="name">Prénom : </label>
        <label for="email">Email : </label>
        <label for="password">Mot de passe : </label>
        <label for="password-confirm">Confirmez votre mot de passe : </label>
      </div>

      <div class="input-div">
        <div class="civility">
          <input type="radio" name="civility" value="M">
          <label for="M">M</label>
          <input type="radio" name="civility" value="Mme">
          <label for="Mme">Mme</label>
        </div>

        <input type="text" class="input input-blank" name="surname" id="surname" value="" placeholder="Votre nom" required/>
        <input type="text" class="input input-blank" name="name" id="name" value="" placeholder="Votre prénom" required/>
        <input type="email" class="input input-blank" name="email" id="email" value="" placeholder="Votre email" required/>
        <input type="password" class="input input-blank" name="password" id="password" value="" placeholder="Votre mot de passe" minlength="5" maxlength="50" required/>
        <input type="password" class="input input-blank" name="password-confirm" id="password-confirm" value="" placeholder="Encore votre mot de passe" required/>

      </div>

    </div> <!-- form-container -->

    <button disabled type="submit" id="sign-up-submit" name="sign-up-submit" class="button button-full">Envoyer</button>

  </form>

</div> <!-- #content -->
