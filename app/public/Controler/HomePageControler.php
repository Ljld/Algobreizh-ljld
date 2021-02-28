<?php

require_once 'View/View.php';

class HomePageControler {

    public function homePage() {
        $vue = new View("homePage");
        $vue->generate(array());
    }

}
