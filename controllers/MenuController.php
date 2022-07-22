<?php

    require_once "services/MenuManager.php";
class MenuController
{
    private $menuManager;

    public function __construct()
    {
        $this->menuManager = new MenuManager();
        $this->menuManager->chargementMenu();
    }

    public function getMenus()
    {
        return $this->menuManager->getMenus();
    }
    public function ajoutMenuValidation()
    {
        $file = $_FILES['image'];
        $repertoire = "public/images/";
        $nomImageAjouter = $this->ajoutImage($file,$repertoire);
       $this->menuManager->ajoutBd($_POST['nom'],$_POST['prix'],$_POST['description'],$_POST['categorie'],$nomImageAjouter);

       header("Location:".URL."/menus");
    }
    public function updateMenu($id)
    {
        $menu = $this->menuManager->getMenuById($id);
        require "views/modifierMenu.php";
    }
    public function ajoutImage($file, $dir)
    {
        try {
            if (!isset($file["name"]) || empty($file["name"])) {
                throw new Exception("Vous devez indiquer une image");
            }
            if (!file_exists($dir)) {
                mkdir($dir, 0777);
            }
            $extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
            $random = rand(0, 99999);
            $target_file = $dir . $random . "_" . $file['name'];

            if (!getimagesize($file["tmp_name"])) {
                throw new Exception("Le fichier n'est pas une image");
            }
            if ($extension != "jpg" && $extension != "jpeg" && $extension != "png" && $extension != "gif") {
                throw new Exception("L'extension n'est pas reconnu");
            }
            if (file_exists($target_file)) {
                throw new Exception("Le fichier est déjà existé");
            }

            if ($file['size'] > 500000) {
                throw new Exception("Le fichier est trop gros");
            }

            if (!move_uploaded_file($file["tmp_name"], $target_file)) {
                throw new Exception("l'ajout de l'image n'a pas fonctionné");
            } else {
                return ($random . "_" . $file['name']);
            }
        } catch (Exception $e) {
            $msg = $e->getMessage();
            require "views/error.php";
        }
    }

    public function modifierMenuValidation()
    {
        $imageActu = $this->menuManager->getMenuById($_POST['id'])->getImage();
        $file = $_FILES['image'];
        if($file['size']>0)
        {
            unlink("public/images/".$imageActu);
            $repertoire = "public/images/";
            $nomImageToAdd = $this->ajoutImage($file,$repertoire);
        }else{
            $nomImageToAdd = $imageActu;
        }
        $this->menuManager->modifierMenuBdd($_POST['id'],$_POST['nom'],$nomImageToAdd,$_POST['prix'],$_POST['description'],$_POST['categorie']);
        header("Location:".URL."/menus");
    }

    public function suppressionMenu($id)
    {
        $nomImage = $this->menuManager->getMenuById($id)->getImage();
        $this->menuManager->supprimerMenuBdd($id);
        unlink("public/images/".$nomImage);
        header("Location: ".URL."/menus");
    }
}