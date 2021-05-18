<?php

require_once 'View/View.php';
require_once 'Model/User.php';

class CustomersControler {

    private $user;

    public function __construct() {
        $this->user = new User();
    }

    public function customerList() {
        $vue = new View("customers");
        $customers = $this->user->getCustomers();
        $vue->generate(array('customers' => $customers));
    }

    public function modifyCustomer($user_id) {
        $vue = new View("modifyCustomer");
        $vue->generate(array('user_id' => $user_id));
    }

    public function deleteCustomer($user_id) {
        $this->user->deleteUser($user_id);
        $vue = new View("msg");
        $vue->generate(array('msg' => 'Client supprimé'));
    }

    public function updateEmail($user_id, $newEmail) {
        $this->user->modifyEmail($user_id, $newEmail);
        $vue = new View("msg");
        $vue->generate(array('msg' => 'Nouveau mail : '.$newEmail));

    }

    public function newCustomer() {
        $vue = new View("newCustomer");
        $vue->generate(array());
    }

}
