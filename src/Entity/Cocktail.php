<?php

namespace App\Entity;

//Je crée une classe Cocktail avec ses propriétés de base (=les attributs du cocktail)
class Cocktail{
    public $id;
    public $name;
    public $description;
    public $image;
    public $ingredients;
    public $createdAt;
    public $isPublished;

    //Ce constructeur est appelé automatiquement quand on crée un nouvel objet de la classe
    public function __construct($name,$description,$ingredients,$image){
        $this->name =$name;
        $this->description=$description;
        $this->ingredients=$ingredients;
        $this->image=$image;

        $this->createdAt= new \DateTime();
        $this->isPublished= true;

        $this->id=2;
    }
}