<?php

/**
 * Classe abstraite Modèle.
 * Centralise les services d'accès à une base de données.
 * Utilise l'API PDO
 *
 */
abstract class Model {

    /** Objet PDO d'accès à la BD */
    private $db;

    /**
     * Exécute une requête SQL éventuellement paramétrée
     *
     * @param string $sql La requête SQL
     * @param array $valeurs Les valeurs associées à la requête
     * @return PDOStatement Le résultat renvoyé par la requête
     */
    protected function executeRequest($sql, $params = null) {
        if ($params == null) {
            $result = $this->getDb()->query($sql); // exécution directe
        }
        else {
            $result = $this->getDb()->prepare($sql);  // requête préparée
            $result->execute($params);
        }
        return $result;
    }

    /**
     * Renvoie un objet de connexion à la BD en initialisant la connexion au besoin
     *
     * @return PDO L'objet PDO de connexion à la db
     */
    private function getDb() {
        if ($this->db == null) {
            // Création de la connexion
            $this->db = new PDO('mysql:host=mysql;dbname=algobreizh;charset=utf8',
                    'algobreizh', 'algobreizh',
                    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
        return $this->db;
    }

}
