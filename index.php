<?php
// Attention on doit préciser au programme l'espace de nom à utiliser
namespace App;
// Je vais chercher le Router se trouvant dans mon espace de nom
// dans le "dossier" Services
use App\Services\Router;

// On charge nos class automatiquement
require_once("./autoload.php");
// On charge la config ma foi ça peut servir aussi
require_once("./config.php");

// On détermine quelle est la route ?page
$router = new Router();
$page = $router->getPage();
// On lance le routage
$router->run();