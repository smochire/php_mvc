<?php

    require_once "models/Menu.php";
    require_once "models/Model.php";
class MenuManager extends Model
{
    private $menus;

    public function ajoutMenu($menu)
    {
        $this->menus[]=$menu;
    }

    public function getMenus()
    {
        return $this->menus;
    }

    public function chargementMenu()
    {
       $query = $this->getBdd()->prepare("SELECT * FROM menu");
        $query->execute();
        $lesMenus = $query->fetchAll(PDO::FETCH_ASSOC);
        foreach ($lesMenus as $menu)
        {
            $m = new Menu($menu['id'],$menu['nom'],$menu['image'],$menu['prix'],$menu['description'],$menu['id_cat']);
            $this->ajoutMenu($m);
        }
    }

    public function getMenuById($id)
    {
        for($i=0;$i<count($this->menus);$i++)
        {
            if($this->menus[$i]->getId() == $id)
            {
                return $this->menus[$i];
            }
        }
        throw new Exception("Le menu n'existe pas!");
    }


    public function ajoutMenuBDD($nom,$prix,$description,$categorie,$image)
    {
        $sql = "INSERT INTO menu(nom, prix,image, description, id_cat) VALUES (:nomM,:prix,:image,:description,:id)";
        $stmt3 = $this->getBdd()->prepare($sql);
        $stmt3->bindValue(":nomM",$nom,PDO::PARAM_STR);
        $stmt3->bindValue(":prix",$prix,PDO::PARAM_STR);
        $stmt3->bindValue(":image",$image,PDO::PARAM_STR);
        $stmt3->bindValue(":description",$description,PDO::PARAM_STR);
        $stmt3->bindValue(":id",$categorie,PDO::PARAM_STR);
        $resultat2 = $stmt3->execute();
        $stmt3->closeCursor();
        return $resultat2;
    }

    public function ajoutBd($nom,$prix,$description,$categorie,$image)
    {

        $resultat2 = $this->ajoutMenuBDD($nom,$prix,$description,$categorie,$image);
        if($resultat2>0)
        {
            $menu = new Menu($this->getBdd()->lastInsertId(),$nom,$image,$prix,$description,$categorie);
            $this->ajoutMenu($menu);
        }
    }

    public function modifierMenuBdd($id,$nom,$image,$prix,$description,$categorie)
    {
        $req = "UPDATE `menu` SET `nom`=:nom,`prix`=:prix,`image`=:images,`description`=:description,`id_cat`=:categorie WHERE id =:id";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":nom",$nom,PDO::PARAM_STR);
        $stmt->bindValue(":prix",$prix,PDO::PARAM_STR);
        $stmt->bindValue(":images",$image,PDO::PARAM_STR);
        $stmt->bindValue(":description",$description,PDO::PARAM_STR);
        $stmt->bindValue(":categorie",$categorie,PDO::PARAM_STR);
        $stmt->bindValue(":id",$id,PDO::PARAM_INT);
        $resultat = $stmt->execute();
        $stmt->closeCursor();
        if($resultat>0)
        {
             $this->getMenuById($id)->setNom($nom);
             $this->getMenuById($id)->setNom($image);
             $this->getMenuById($id)->setNom($prix);
             $this->getMenuById($id)->setNom($description);
             $this->getMenuById($id)->setNom($categorie);
        }
    }

    public function supprimerMenuBdd($id)
    {
        $req = "DELETE FROM `menu` WHERE id=:id";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":id",$id,PDO::PARAM_INT);
        $resultat = $stmt->execute();
        $stmt->closeCursor();
        if($resultat > 0)
        {
            $livre = $this->getMenuById($id);
            unset($livre);
        }
    }

}