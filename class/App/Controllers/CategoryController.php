<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\Category;
use App\Models\CategoryManager;
use App\Services\Authenticator;

class CategoryController extends Controller
{

    public function __construct()
    {
        if (Authenticator::isNotGranted("ROLE_ADMIN")) {
            header("Location:?page=login");
        }
    }

    public function index()
    {
        $manager = new CategoryManager();
        $categories = $manager->getAll();
        $this->render('./views/template_category.phtml', [
            'categories' => $categories
        ]);
    }

    public function new()
    {
        // On anticipe d'éventuelles erreurs en créant un tableau
        $errors = [];
        // SI LE FORMULAIRE EST ENVOYE
        if (isset($_POST['submit'])) {

            $category = new Category();
            // Je recup le name et je le néttoie puis je l'insert dans mon objet
            $name = strip_tags(trim($_POST['name']));
            $slugName = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $name)));
            $category
                ->setName($name)
                ->setSlug($slugName);

            $errors = $category->validate();

            // SI YA PAS D'ERREURS ON FAIT L'INSERT
            if (empty($errors)) {
                $categoryArray = $category->toArray();
                $manager = new CategoryManager();
                $manager->insert($categoryArray);
                // ON redirige !
                header('Location:?page=category');
            }
        }
        $this->render('./views/template_category_new.phtml', [
            'errors' => $errors
        ]);
    }

    public function edit()
    {
        // On anticipe d'éventuelles erreurs en créant un tableau
        $errors = [];
        // on récupère l'id depuis l'url
        // on la convertit en entier pour être plus prudent...
        $id = intval($_GET['id']);
        // charge le manager qui correspond à category
        $manager = new CategoryManager();
        // On fait une petite requète pour récupérer la picture à modifier
        $category = $manager->getOneById($id);
        // Si le formulaire est validé on update dans la table
        // Sans oublier de préciser l'id
        if (isset($_POST['submit'])) {
            $newCat = new Category();
            // Je recup le name et je le néttoie puis je l'insert dans mon objet
            $name = strip_tags(trim($_POST['name']));
            $slugName = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $name)));
            $newCat
                ->setName($name)
                ->setSlug($slugName);

            $errors = $newCat->validate();
            // SI YA PAS D'ERREURS ON FAIT L'INSERT
            if (empty($errors)) {
                $catArray = $newCat->toArray();
                $catArray[] = $id;
                $manager->update($catArray);
                // ON redirige !
                header('Location:?page=category');
            }
        }
        $this->render('./views/template_category_edit.phtml', [
            "category"  => $category,
            "errors"    => $errors
        ]);
    }

    public function delete()
    {
        if (isset($_GET['id'])) {
            $id = intval($_GET['id']);
            $manager = new CategoryManager();
            if ($manager->delete($id)) {
                header("Location:?page=category");
            }
        }
    }
}
