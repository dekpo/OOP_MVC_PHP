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
        $this->page = isset($_GET['page']) ? strtolower($_GET['page']) : 'home';
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
        $page = $this->getPage();
        $action = $this->getAction();
        $controllerName = 'App\Controllers\\NotFoundController';

        // On charge le controller correspondant
        // En déterminant le nom du controller ex:HomeController
        if (file_exists("./class/App/Controllers/" . ucfirst($page) . 'Controller.php')) {
            $controllerName = 'App\Controllers\\' . ucfirst($page) . 'Controller';
        }
            // On peut déterminer ensuite le fichier à charger
            // On instancie la class ex: new HomeController()
            $controller = new $controllerName();
            // On peut exécuter la méthode "index()" par défaut
            // Ou une autre méthode au besoin
            $controller->$action();
    }
}
