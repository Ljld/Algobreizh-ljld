<?php
  if(!isset($_SESSION)) 
  { 
      session_start(); 
  } 
?>

<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="Content/style.css" />
        <link rel="stylesheet" href="Content/swup.css" />
        <link rel="stylesheet" href="Content/form.css" />
        <link rel="stylesheet" href="Content/client-area.css" />
        <link rel="stylesheet" href="Content/order.css" />
        <title><?= $title ?></title>
    </head>
    <body>
      <header>
        <nav>
          <div class="logo">
            <a href="index.php"><h2>Algobreizh</h2></a>
          </div>
          <div class="nav-bar">
            <?= $navBar ?>
          </div>
        </nav>
        <hr>

      </header>
        <div id="content" class="transition-fade">
            <?= $content ?>
        </div> <!-- #content -->

      <footer>
        <hr>
        <h2>&copy; Algobreizh 2021</h2>
      </footer>
      <script type="text/javascript" src='/JS/form.js'></script>
      <script type="text/javascript" src='/JS/logout.js'></script>
      <script src="https://unpkg.com/swup@latest/dist/swup.min.js"></script>
      <script type="module" src='/JS/swup.js'></script>


    </body>
</html>
