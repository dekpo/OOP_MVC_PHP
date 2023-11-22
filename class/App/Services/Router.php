<?php

namespace App\Services;

/**
 * A very simple class router
 * based on $_GET['page']
 */
class Router
{

    private $page;
    private $action;

    public function __construct()
    {
        $this->setPage();
        $this->setAction();
    }

    public function setPage()
    {
        $this->page = isset($_GET['page']) && !empty($_GET['page']) ? strtolower($_GET['page']) : 'home';
    }

    public function getAction()
    {
        return $this->action;
    }

    public function setAction()
    {
        $this->action = isset($_GET['action']) ? strtolower($_GET['action']) : 'index';
    }

    public function getPage()
    {
        return $this->page;
    }

    public function run()
    {
        $controllerName = 'App\Controllers\\NotFoundController';
        $action = 'index';

        // On charge le controller correspondant
        // En déterminant le nom du controller ex:HomeController
        // Si le fichier existe
        if (file_exists("./class/App/Controllers/" . ucfirst($this->getPage()) . 'Controller.php')) {
            $controllerName = 'App\Controllers\\' . ucfirst($this->getPage()) . 'Controller';
        }
        // On définit la méthode correspondante
        // Si elle existe
        if (method_exists($controllerName,$this->getAction())) {
            $action = $this->getAction();
        }
            // On peut déterminer ensuite le fichier à charger
            // On instancie la class ex: new HomeController()
            $controller = new $controllerName();
            // On peut exécuter la méthode "index()" par défaut
            // Ou une autre méthode au besoin
            $controller->$action();
    }
}
