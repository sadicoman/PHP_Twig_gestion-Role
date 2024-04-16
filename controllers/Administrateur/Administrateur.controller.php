<?php
require_once("./controllers/MainController.controller.php");
require_once("./models/Administrateur/Administrateur.model.php");

class AdministrateurController extends MainController
{
    private $administrateurManager;

    public function __construct()
    {
        parent::__construct();
        $this->administrateurManager = new AdministrateurManager();
    }

    public function droits()
    {
        $utilisateurs = $this->administrateurManager->getUtilisateurs();

        $data_page = [
            "page_description" => "Gestion des droits",
            "page_title" => "Gestion des droits",
            "utilisateurs" => $utilisateurs,
            "is_connected" => Securite::estConnecte(),
            "is_admin" => Securite::estAdministrateur(),
            "view" => "Administrateur/droits.twig",
            "template" => "common/template.twig"
        ];
        $this->genererPage($data_page);
    }

    public function validation_modificationRole($login, $role)
    {
        if ($this->administrateurManager->bdModificationRoleUser($login, $role)) {
            Toolbox::ajouterMessageAlerte("La modification a été prise en compte", Toolbox::COULEUR_VERTE);
        } else {
            Toolbox::ajouterMessageAlerte("La modification n'a pas été prise en compte", Toolbox::COULEUR_ROUGE);
        }
        header("Location: " . URL . "administration/droits");
    }

    public function pageErreur($msg)
    {
        parent::pageErreur($msg);
    }
}
