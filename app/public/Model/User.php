<?php

require_once 'Model/Model.php';

class User extends Model {

    /** Renvoie la liste des billets du blog
     *
     * @return PDOStatement La liste des billets
     */
    /*public function getUsers() {
        $sql = 'SELECT * FROM users';
        $users = $this->executeRequest($sql);
        return $users;
    }

    /** Renvoie les informations sur un billet
     *
     * @param int $id L'identifiant du billet
     * @return array Le billet
     * @throws Exception Si l'identifiant du billet est inconnu
     *//*
    public function getUser($idUser) {
        $sql = 'SELECT * FROM users WHERE id = ' . $idUser;
        $user = $this->executeRequest($sql, array($idUser));
        if ($user->rowCount() > 0)
            return $user->fetch();  // Accès à la première ligne de résultat
        else
            throw new Exception("Aucun billet ne correspond à l'identifiant '$idUser'");
    }*/

    public function createUser($name, $surname, $civility, $email, $password) {
        $sql = "INSERT INTO users (name, surname, civility, email, password, userType)"
        . " values ('{$name}','{$surname}','{$civility}','{$email}', '{$password}', 'customer')";

        $user = $this->executeRequest($sql);
        /*
        if ($billet->rowCount() > 0)
            return $billet->fetch();  // Accès à la première ligne de résultat
        else
            throw new Exception("Aucun billet ne correspond à l'identifiant '$idBillet'");*/
    }

    public function getname($email) {
      $sql = "SELECT name FROM users WHERE email = '{$email}'";
      $name = $this->executeRequest($sql);
      $name = $name->fetch();
      return $name['name'];
    }

    public function getUserHash($email) {
      $sql = "SELECT password FROM users WHERE email = '{$email}'";
      $hash = $this->executeRequest($sql);
      $hash = $hash->fetch();
      return $hash['password'];
    }

    public function getUserID($email) {
      $sql = "SELECT user_id FROM users WHERE email = '{$email}'";
      $user_id = $this->executeRequest($sql);
      $user_id = $user_id->fetch();
      return $user_id['user_id'];
    }

}
