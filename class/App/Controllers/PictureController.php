<?php
namespace App\Controllers;
use App\Controllers\Controller;
use App\Models\Picture;
use App\Models\PictureManager;

class PictureController extends Controller
{

    public function index(){
        $pic = new PictureManager();
        $pictures = $pic->getAll();
        $this->render('./views/template_picture.phtml', [
            "pictures" => $pictures
        ]);
    }

    public function new()
    {
        $errors = [];
        $success = false;
        $upload_max_filesize =  ini_get('upload_max_filesize');

        // Si le formulaire est validé on va tenter l'upload et on insert dans la table
        if (isset($_POST['submit']) && !empty($_POST['title'])) {
            // On récup de title brut
            $title = strip_tags($_POST['title']);
            // On génère un nom de fichier sans espace (avec des tirets) sans accent en minuscules...
            $slugName = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $title)));
            /*
    TRAITEMENT DU FICHIER POUR GERER L'UPLOAD
    */
            $tempFile = $_FILES["src"]["tmp_name"];
            $fileType = $_FILES["src"]["type"];
            $fileSize = $_FILES["src"]["size"];
            $acceptedType = ["png", "jpeg"];
            $tabFileName = !empty($fileType) ? explode("/", $fileType) : [1 => ""];
            $fileExt = $tabFileName[1];

            if ($fileSize > $upload_max_filesize) {
                $errors[] = "Le fichier est trop gros !";
            }

            if (empty($fileSize)) {
                $errors[] = "Fichier non traité. Vérifiez éventuellement qu'il ne soit pas trop gros...";
            }

            if (!in_array($fileExt, $acceptedType)) {
                $errors[] = "Le fichier doit être un .jpg, .jpeg ou .png uniquement";
            }

            if (empty($errors)) {
                $newFile = "./uploads/" . $slugName . "-" . time() . "." . $fileExt;
                if (@move_uploaded_file($tempFile, $newFile)) {
                    $success = true;
                } else {
                    $errors[] = "Erreur lors de l'upload du fichier :(";
                }
            }
            /*
    FIN DU TRAITEMENT DU FICHIER POUR GERER L'UPLOAD
    */

            if (empty($errors)) {
                // On instancie la class User pour créer un nouvel utilisateur
                $pic = new Picture();
                $pic
                ->setTitle($_POST['title'])
                ->setDescription($_POST['description'])
                ->setSrc($newFile)
                ->setAuthor($_POST['author'])
                ->setUpdatedAt(date("Y-m-d H:i:s"));
                $picArray = $pic->toArray();
                $picManager = new PictureManager();
                $insert = $picManager->insert($picArray);
                // Et on redirige sur l'admin_list si la requète retourne le dernier id inséré !
                if ($insert->lastInsertId()) header("Location:?page=picture");
            }
        }
        $this->render('./views/template_picture_new.phtml', [
            "errors" => $errors,
            'success' => $success
        ]);
    }

    public function delete()
    {
        // Si l'id est dans l'url on delete dans la table
        // Si le delete dans la table a bien été effectué on unlink() le fichier
        if (isset($_GET['id'])) {
            $id = intval($_GET['id']);
            $picture = new PictureManager();
            // On fait une petite requète pour récupérer la source à supprimer
            $pic = $picture->getOneById($id);
            $srcToDelete = $pic["src"];
            // On fait la suppression de la ligne dans la table
            // Si la requète de suppression a bien été effectuée
            if ($picture->delete($id)) {
                // Si le fichier existe on le supprime avec unlink()
                if (file_exists($srcToDelete)) {
                    unlink($srcToDelete);
                }
            }
            // Et on redirige sur l'admin_list
            header("Location:?page=picture");
        }
    }

    public function edit()
    {
        // on récupère l'id depuis l'url
        // on la convertit en entier pour être plus prudent...
        $id = intval($_GET['id']);
        $pictureManager = new PictureManager();
        // On fait une petite requète pour récupérer la picture à modifier
        $picture = $pictureManager->getOneById($id);
        // Si le formulaire est validé on update dans la table
        // Sans oublier de préciser l'id
        if (isset($_POST['submit'])) {
            $newPic = new Picture();
            $newPic->setTitle($_POST['title'])
            ->setDescription($_POST['description'])
            ->setSrc($_POST['src'])
            ->setAuthor($_POST['author'])
            ->setUpdatedAt(date('Y-m-d H:i:s'));

            $pictureArray = $newPic->toArray();
            $pictureArray[] = $id;
            
            $pictureManager = new PictureManager();
            $pictureManager->update($pictureArray);
            // Et on redirige sur l'adminlist
            header("Location:?page=picture");
        }
        $this->render('./views/template_picture_edit.phtml', [
            "picture" => $picture
        ]);
    }
}
