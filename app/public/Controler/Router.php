<?php

session_start();

require_once 'Controler/HomePageControler.php';
require_once 'Controler/SignUpControler.php';
require_once 'Controler/LoginControler.php';
require_once 'Controler/ClientAreaControler.php';
require_once 'Controler/OrderControler.php';
require_once 'Controler/CartControler.php';
require_once 'Controler/CustomersControler.php';
require_once 'View/View.php';

class Router {

    private $homePageCtrl;
    private $signUpCtrl;
    private $loginCtrl;
    private $clientAreaCtrl;
    private $orderCtrl;
    private $customersCtrl;

    public function __construct() {
        $this->homePageCtrl = new HomePageControler();
        $this->signUpCtrl = new SignUpControler();
        $this->loginCtrl = new LoginControler();
        $this->clientAreaCtrl = new ClientAreaControler();
        $this->orderCtrl = new OrderControler();
        $this->cartCtrl = new CartControler();
        $this->customersCtrl = new CustomersControler();
    }

    // Route une requête entrante : exécution l'action associée
    public function routeRequest() {
        try {
            if (isset($_GET['action'])) {
                if ($_GET['action'] == 'login') {
                  $this->loginCtrl->login();
                }

                else if ($_GET['action'] == 'valid-login'){

                  $email = $this->getParam($_POST, 'email');
                  $password = $this->getParam($_POST, 'password');
                  $this->loginCtrl->checkPassword($email, $password);

                }

                else if ($_GET['action'] == 'logout') {
                  unset($_SESSION['isLoggedIn']);
                  session_destroy();
                  $this->loginCtrl->login();
                }

                else if ($_GET['action'] == 'sign-up') {
                  $this->signUpCtrl->signUp();
                }

                else if ($_GET['action'] == 'valid-sign-up') {
                  $name = $this->getParam($_POST, 'name');
                  $surname = $this->getParam($_POST, 'surname');
                  $civility = $this->getParam($_POST, 'civility');
                  $email = $this->getParam($_POST, 'email');
                  $password = password_hash($this->getParam($_POST, 'password'), PASSWORD_DEFAULT);
                  $this->signUpCtrl->validSignUp($name, $surname, $civility, $email, $password);
                }

                else if ($_GET['action'] == 'client-area') {
                  if (isset($_SESSION['name'])) {
                    $this->clientAreaCtrl->clientArea($_SESSION['email'], $_SESSION['name']);
                  }
                  else {
                    $this->loginCtrl->login();
                  }
                }

                else if ($_GET['action'] == 'order') {
                  $this->orderCtrl->order($_GET['order_id'], $_SESSION['email']);
                }

                else if ($_GET['action'] == 'order-list') {
                  $this->orderCtrl->orderList($_SESSION['email']);
                }

                else if ($_GET['action'] == 'new-order') {
                  $this->orderCtrl->newOrder();
                }

                else if ($_GET['action'] == 'bill-list') {
                  $this->orderCtrl->billList($_SESSION['email']);
                }

                else if ($_GET['action'] == 'add-to-cart') {
                  //$qty = $this->getParam($_POST, 'qty');
                  $this->cartCtrl->addToCart($_GET['product_id'], $_GET['qty']);
                }

                else if ($_GET['action'] == 'cart') {
                  $this->cartCtrl->cart();
                }

                else if ($_GET['action'] == 'delete-line') {
                  $this->cartCtrl->deleteLine($_GET['product_id']);
                }

                else if ($_GET['action'] == 'send-order') {
                  $exp = $this->getParam($_POST, 'exp-add');
                  $bill = $this->getParam($_POST, 'bill-add');
                  $this->cartCtrl->sendOrder($exp, $bill);
                }
                else if ($_GET['action'] == 'ship-order') {
                  $this->orderCtrl->shipOrder($_GET['order_id']);
                }
                else if ($_GET['action'] == 'customer-list') {
                  $this->customersCtrl->customerList();
                }
                else if ($_GET['action'] == 'modify-customer') {
                  $this->customersCtrl->modifyCustomer($_GET['user_id']);
                }
                else if ($_GET['action'] == 'update-email') {
                  $this->customersCtrl->updateEmail($_GET['user_id'], $this->getParam($_POST, 'newEmail'));
                }
                else if ($_GET['action'] == 'delete-customer') {
                  $this->customersCtrl->deleteCustomer($_GET['user_id']);
                }

                else if ($_GET['action'] == 'new-customer') {
                  $this->customersCtrl->newCustomer();
                }

                else
                  throw new Exception("Action non valide");
            }
            else {  // aucune action définie : affichage de l'accueil
              if (isset($_SESSION['isLoggedIn'])) {
                if ($_SESSION['isLoggedIn']) {
                  if ($_SESSION['email'] == 'prod@algobreizh.com') {
                    $this->clientAreaCtrl->adminArea($_SESSION['email']);
                  }
                  else {
                    $this->clientAreaCtrl->clientArea($_SESSION['name'], $_SESSION['name']);
                  }
                  
                }
                else {
                  $this->homePageCtrl->homePage();
                }
              }
              else {
                $this->homePageCtrl->homePage();
              }
                

            }
        }
        catch (Exception $e) {
            $this->error($e->getMessage());
        }
    }

    // Affiche une erreur
    private function error($errorMsg) {
        $vue = new View("error");
        $vue->generate(array('errorMsg' => $errorMsg));
    }

    // Recherche un paramètre dans un tableau
    private function getParam($array, $name) {
        if (isset($array[$name])) {
            return $array[$name];
        }
        else
            throw new Exception("Paramètre '$name' absent");
    }

}
