<?php
require_once("./controllers/MainController.controller.php");
require_once("./models/Visiteur/Visiteur.model.php");

class VisiteurController extends MainController
{

    private $visiteurManager;

    public function __construct()
    {
        parent::__construct();
        $this->visiteurManager = new VisiteurManager();
    }

    public function accueil()
    {
        // echo password_hash("...", PASSWORD_DEFAULT);

        $data_page = [
            "page_description" => "Description de la page d'accueil",
            "page_title" => "Titre de la page d'accueil",
            "is_connected" => Securite::estConnecte(),
            "is_admin" => Securite::estAdministrateur(),
            "view" => "Visiteur/accueil.twig",
            "template" => "common/template.twig"
        ];
        $this->genererPage($data_page);
    }

    public function login()
    {
        $data_page = [
            "page_description" => "Page de connection",
            "page_title" => "Page de connection",
            "is_connected" => Securite::estConnecte(),
            "is_admin" => Securite::estAdministrateur(),
            "view" => "Visiteur/login.twig",
            "template" => "common/template.twig"
        ];
        $this->genererPage($data_page);
    }

    public function creerCompte()
    {
        $data_page = [
            "page_description" => "Page de création de compte",
            "page_title" => "Page de création de compte",
            "is_connected" => Securite::estConnecte(),
            "is_admin" => Securite::estAdministrateur(),
            "view" => "Visiteur/creerCompte.twig",
            "template" => "common/template.twig"
        ];
        $this->genererPage($data_page);
    }

    public function pageErreur($msg)
    {
        parent::pageErreur($msg);
    }
}
