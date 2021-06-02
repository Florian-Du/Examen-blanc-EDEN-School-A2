<?php


namespace Livres\Controllers;


use Livres\Models\MainManager;
use Livres\Validator;

class MainController
{
    private $manager;
    private $validator;

    public function __construct() {
        $this->manager = new MainManager();
        $this->validator = new Validator();
    }

    public function index() {
        $livres = $this->manager->getAllLivres();
        $categories = $this->manager->getAllCategory($livres);
        $lescatgories = $this->manager->getAllCategories();
        $auteurs = $this->manager->getAllAuteur();
        $nombreLivre = $this->manager->getNombreLivre();
        require VIEWS.'homepage.php';
    }

    public function filtre() {
        $livres = $this->manager->getLivreWithFiltre($_POST['nombre-page'], $_POST['auteur'],$_POST['categorie']);
        $categories = $this->manager->getAllCategory($livres);
        $lescatgories = $this->manager->getAllCategories();
        $auteurs = $this->manager->getAllAuteur();
        $nombreLivre = $this->manager->getNombreLivreWithParametre($_POST['nombre-page'], $_POST['auteur'],$_POST['categorie']);

        require VIEWS.'homepage.php';

    }

    public function erreur()
    {
        require VIEWS.'404.php';
    }

}