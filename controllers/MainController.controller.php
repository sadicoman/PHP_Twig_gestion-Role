<?php
require_once './vendor/autoload.php'; // Pour charger Twig et autres dépendances via Composer
require_once("controllers/Toolbox.class.php"); // Pour utiliser les fonctionnalités de Toolbox

abstract class MainController
{
    protected $twig;

    public function __construct()
    {
        $loaderPath = __DIR__ . '/../views';
        // var_dump($loaderPath); // Vérifiez le chemin résolu
        $loader = new \Twig\Loader\FilesystemLoader($loaderPath);
        $this->twig = new \Twig\Environment($loader);
    }

    // Ajouter un message d'alerte
    function ajouterMessageAlerte($type, $message)
    {
        if (!isset($_SESSION['alert'])) {
            $_SESSION['alert'] = [];
        }

        $_SESSION['alert'][] = ['type' => $type, 'message' => $message];
    }


    protected function genererPage($data)
    {
        // Passe les alertes à Twig
        if (isset($_SESSION['alert'])) {
            $data['alertes'] = $_SESSION['alert'];
            unset($_SESSION['alert']); // Efface les alertes après les avoir passées
        } else {
            $data['alertes'] = []; // Assurez-vous que 'alertes' existe toujours dans le contexte Twig
        }

        // Vérifie si un template spécifique est fourni, sinon utilise 'common/template.twig' par défaut
        $templateBase = $data['template'] ?? 'common/template.twig';
        $this->twig->addGlobal('base_template', $templateBase);

        // Rend le template spécifique
        echo $this->twig->render($data['view'], $data);
    }



    protected function pageErreur($msg)
    {
        $data_page = [
            "page_description" => "Page permettant de gérer les erreurs",
            "page_title" => "Page d'erreur",
            "msg" => $msg,
            "view" => "./erreur.twig",
            "template" => "common/template.twig"
        ];
        $this->genererPage($data_page);
    }
}
