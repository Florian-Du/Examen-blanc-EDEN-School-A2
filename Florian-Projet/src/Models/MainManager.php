<?php


namespace Livres\Models;


class MainManager
{
    private $bdd;
    // connexion a la bdd
    public function __construct() {
        $this->bdd = new \PDO('mysql:host='.HOST.';dbname=' . DATABASE . ';charset=utf8;' , USER, PASSWORD);
        $this->bdd->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    // fonction pour recuperer tous les livres avec les noms et prenoms des auteur
    public function getAllLivres() {
        $stmt = $this->bdd->prepare('SELECT id_book, tbl_book.id_author, title, date_disponibilite, num_pages, name_author, first_name_author FROM tbl_book INNER JOIN tbl_author ON tbl_book.id_author = tbl_author.id_author');
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_CLASS,"Livres\Models\Book");



    }

    // function pour recuperer le nombre de livre
    public function getNombreLivre() {
        $stmt = $this->bdd->prepare('SELECT COUNT(*) AS nombreLivre FROM tbl_book');
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_CLASS,"Livres\Models\Book");

    }

    public function getNombreLivreWithParametre($nombre_page,$auteur,$categorie) {
        $stmt = $this->bdd->prepare('SELECT COUNT(*) AS nombreLivre FROM tbl_book_rel_category INNER JOIN tbl_book ON tbl_book_rel_category.id_book = tbl_book.id_book INNER JOIN tbl_author ON tbl_book.id_author = tbl_author.id_author WHERE tbl_book.id_author '.$auteur.' AND num_pages '.$nombre_page.' AND id_cat '.$categorie);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_CLASS,"Livres\Models\Book");
    }
    // fonction pour recuperer toutes les lires avec leur category associer
    public function getAllCategory($livres) {
        $categories = [];
        foreach ($livres as $livre) {
            $stmt = $this->bdd->prepare('SELECT * FROM tbl_book_rel_category INNER JOIN tbl_category ON id_cat = id_category WHERE id_book = '.$livre->getIdBook());
            $stmt->execute();

            $unecategorie = $stmt->fetchAll(\PDO::FETCH_CLASS,"Livres\Models\CategoryRel");
            array_push($categories,$unecategorie);
        }
        return $categories;
    }

    //function pour avoir juste les categories sans la relation avec les livres
    public function getAllCategories() {
        $stmt = $this->bdd->prepare('SELECT * FROM tbl_category');
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_CLASS,"Livres\Models\Category");
    }
    //function pour avoir les auteur
    public function getAllAuteur() {
        $stmt = $this->bdd->prepare('SELECT * FROM tbl_author');
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_CLASS,"Livres\Models\Auteur");
    }

    //function pour avoir les livres avec les filtres !!!! PAS FINI !!!!! il manque le filtre des  categorie qui ne fonctionne pas encore
    public function getLivreWithFiltre($nombre_page,$auteur,$categorie) {
        $stmt = $this->bdd->prepare('SELECT tbl_book_rel_category.id_book, id_cat,tbl_book.id_author, title, date_disponibilite, num_pages, name_author, first_name_author FROM tbl_book_rel_category INNER JOIN tbl_book ON tbl_book_rel_category.id_book = tbl_book.id_book INNER JOIN tbl_author ON tbl_book.id_author = tbl_author.id_author WHERE tbl_book.id_author '.$auteur.' AND num_pages '.$nombre_page.' AND id_cat '.$categorie);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_CLASS,"Livres\Models\Book");
    }
}