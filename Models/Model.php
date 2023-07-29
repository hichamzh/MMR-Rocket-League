<?php

class Model
{
    private $bdd;
    private static $instance = null;

    private function __construct()
    {
        // 
        $dsn = "mysql:host=localhost;dbname=rocket_league"; // Adresse du serveur de la base de données avec le nom de la bdd
        $dbUser = "root"; // Nom d'utilisateur de la base de données
        $dbPass = ""; // Mot de passe de la base de données
        // Crée un nouvel objet PDO qui permet la connexion
        $this->bdd = new PDO($dsn, $dbUser, $dbPass);
        // encodage en utf-8 pour communiquer avec bdd
        $this->bdd->query("SET NAMES 'utf8'");
        // l'attribut ERRMODE_Exception permet de générer des exceptions en cas d'erreur
        $this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }


    public function testDatabase()
    {
        try {
            // Effectuer une requête de test
            $query = $this->bdd->query("SELECT 1");

            // Vérifier si la requête s'est exécutée sans erreur
            if ($query !== false) {
                echo "La connexion à la base de données est établie avec succès.";
            } else {
                echo "Erreur lors de l'exécution de la requête de test.";
            }
        } catch (PDOException $e) {
            echo "Erreur lors de la connexion à la base de données : " . $e->getMessage();
        }
    }

    public static function get_model()
    {
        // vérifie d'abord que propriété $instance est null/vide
        if (is_null(self::$instance)) {
            // Création d'une instance de la classe Model en utilisant la connexion fournie 
            self::$instance = new Model();
        }
        // stock dans $instance et la retourne 
        return self::$instance;
    }

    public function get_mode_jeu()
    {
        $requete = $this->bdd->prepare("SELECT * FROM mode_jeu");
        $requete->execute();
        $result = $requete->fetchAll(PDO::FETCH_OBJ);

        return $result;

    }

    public function get_rank($id_mode)
    {
        $requete = $this->bdd->prepare("SELECT * FROM choix_equipe c WHERE c.id_mode = :id_mode");
        $requete->bindValue(':id_mode', $id_mode);
        $requete->execute();
        $result = $requete->fetchAll(PDO::FETCH_OBJ);

        return $result;
    }

    public function get_rank_choix($id_choix)
    {
        $requete = $this->bdd->prepare('SELECT * FROM niveau n  WHERE n.id_choix = :id_choix');
        $requete->bindValue(':id_choix', $id_choix);
        $requete->execute();
        $result = $requete->fetchAll(PDO::FETCH_OBJ);

        return $result;
    }
}