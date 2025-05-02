<?php

namespace App\Entity;

//On importe le namespace Doctrine\ORM\Mapping pour pouvoir utiliser les attributs
// ci dessous :   #[ORM\Id] / #[ORM\GeneratedValue]
use Doctrine\ORM\Mapping as ORM;

//cette annotation permet de dire à Doctrine que c'est une table dans la BD
#[ORM\Entity]
//Je crée une classe Cocktail avec ses propriétés de base (=les attributs du cocktail)
class Cocktail{

    // on définit la clé primaire à ID
    #[ORM\Id]
    //en auto-incrément dans MySQL
    #[ORM\GeneratedValue]
    //cette colonne est de type INT
    #[ORM\Column (type:'integer')]
    public ?int $id = null;
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