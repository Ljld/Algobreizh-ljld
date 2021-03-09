<?php

if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

class View {

    // Nom du fichier associé à la vue
    private $file;

    // Titre de la vue (défini dans le fichier vue)
    private $title;

    public function __construct($action) {
        // Détermination du nom du fichier vue à partir de l'action
        $this->file = "View/" . $action . "View.php";
    }

    // Génère et affiche la vue
    public function generate($data) {
    //public function generate($data) {
        // Génération de la partie spécifique de la vue
        $content = $this->generateFile($this->file, $data);
        // Génération du gabarit commun utilisant la partie spécifique
        if (isset($_SESSION['isLoggedIn'])) {
            if ($_SESSION['isLoggedIn']) {
                $cartLinesNb = 0;
                if (isset($_SESSION['cart'])) {
                    $cartLinesNb = count($_SESSION['cart']);
                }
                
                $navBar = "<span class='cart-badge'>{$cartLinesNb}</span>" .
                          "<a id='cart-a' href='index.php?action=cart'><svg class='cart-icon' enable-background='new 0 0 40 40' id='Слой_1' version='1.1' viewBox='0 0 40 40' xml:space='preserve' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'><g><path d='M38.9,11.9c-0.8-0.9-1.9-1.5-3.1-1.5H20.4c-0.5,0-1,0.4-1,1c0,0.6,0.5,1,1,1h15.4c0.6,0,1.2,0.3,1.6,0.7   c0.4,0.5,0.6,1.1,0.4,1.7l-0.9,5h-11c-0.5,0-1,0.4-1,1s0.5,1,1,1h10.7l-0.9,4.8c-0.1,0.7-0.8,1.2-1.5,1.2H15   c-0.7,0-1.3-0.5-1.5-1.2L9.6,4.9c-0.1-0.5-0.5-0.8-1-0.8H0.9c-0.5,0-1,0.4-1,1s0.5,1,1,1h6.9l3.8,21c0.2,1.4,1.2,2.4,2.5,2.8   c-0.5,0.7-0.9,1.6-0.9,2.6c0,2.5,2,4.5,4.5,4.5c2.5,0,4.5-2,4.5-4.5c0-0.9-0.3-1.8-0.8-2.5h6.1c-0.5,0.7-0.8,1.6-0.8,2.5   c0,2.5,2,4.5,4.5,4.5c2.5,0,4.5-2,4.5-4.5c0-1-0.3-1.9-0.8-2.6c1.3-0.3,2.4-1.4,2.7-2.8l2.2-11.8C40,14.1,39.7,12.9,38.9,11.9z    M20.2,32.4c0,1.4-1.1,2.5-2.5,2.5s-2.5-1.1-2.5-2.5c0-1.4,1.1-2.5,2.5-2.5S20.2,31,20.2,32.4z M31.3,34.9c-1.4,0-2.5-1.1-2.5-2.5   c0-1.4,1.1-2.5,2.5-2.5c1.4,0,2.5,1.1,2.5,2.5C33.8,33.8,32.7,34.9,31.3,34.9z'/></g>" .
                          " </svg></a>" .
                //$navBar = "<img  class='cart-icon' src='/content/pics/cart.svg' alt='cart icon' />" .
                          "<a href='index.php?action=client-area'>{$_SESSION['name']}</a>";
              }
              else {
                $navBar = "<a href='index.php?action=sign-up'>Inscription</a>" .
                          "<a href='index.php?action=login'>Se connecter</a>";
              }
        }
        else {
            $navBar = "<a href='index.php?action=sign-up'>Inscription</a>" .
                        "<a href='index.php?action=login'>Se connecter</a>";
        }
        

        $view = $this->generateFile('View/template.php',
                array('title' => $this->title, 'content' => $content, 'navBar' => $navBar));
        // Renvoi de la vue au navigateur
        echo $view;
    }

    // Génère un fichier vue et renvoie le résultat produit
    private function generateFile($file, $data) {
        if (file_exists($file)) {
            // Rend les éléments du tableau $donnees accessibles dans la vue
            extract($data);
            // Démarrage de la temporisation de sortie
            ob_start();
            // Inclut le fichier vue
            // Son résultat est placé dans le tampon de sortie
            require $file;
            // Arrêt de la temporisation et renvoi du tampon de sortie
            return ob_get_clean();
        }
        else {
            throw new Exception("Fichier '$file' introuvable");
        }
    }

}
