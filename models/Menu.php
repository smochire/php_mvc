<?php


class Menu
{
    private $id;
    private $nom;
    private $prix;
    private $description;
    private $image;
    private $categorie;

    public function __construct($id, $nom, $image, $prix, $description, $categorie)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->image = $image;
        $this->prix = $prix;
        $this->description = $description;
        $this->categorie = $categorie;
    }

    public function getImage()
    {
        return $this->image;
    }


    public function setImage($image)
    {
        $this->image = $image;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function getPrix()
    {
        return $this->prix;
    }

    public function setPrix($prix)
    {
        $this->prix = $prix;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getCategorie()
    {
        return $this->categorie;
    }

    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;
    }

}