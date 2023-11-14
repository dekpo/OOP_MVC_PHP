<?php
// Attention on doit préciser au programme l'espace de nom à utiliser
namespace App;
// Je vais chercher le Router se trouvant dans mon espace de nom
// dans le "dossier" Services
use App\Services\Router;

// On charge nos class automatiquement
require_once("./autoload.php");

// On détermine quelle est la route ?page
$router = new Router();
$page = $router->getPage();
// On charge le controller correspondant
// En déterminant le nom du controller ex:HomeController
$controllerName = 'App\Controllers\\'. ucfirst($page) . 'Controller';
// On peut déterminer ensuite le fichier à charger

// On instancie la class ex: new HomeController()
$controller = new $controllerName();
// On peut exécuter la méthode "index()"
$controller->index();