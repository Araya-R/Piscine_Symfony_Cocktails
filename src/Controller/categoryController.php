<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class categoryController extends AbstractController
{
    public function categoryTable()
    {
        return [
            1 => [
                "id" => 1,
                "nom" => "cocktail",
                "description" => "cocktails classiques avec alcool"
            ],
            2 => [
                "id" => 2,
                "nom" => "mocktail",
                "description" => "cocktails sans alcool"
            ],
            3 => [
                "id" => 3,
                "nom" => "shooter",
                "description" => "moins de 25 cl"
            ],
            4 => [
                "id" => 4,
                "nom" => "cocktails soft",
                "description" => "cocktails sans alcool fort"
            ],
        ];
    }

    //Route vers la page qui affiche toutes les catégories
    #[Route("/category", name: "category")]
    public function  listcategory(){

        $listcategory=$this->categoryTable();
        return $this->render('category.html.twig',['category' =>$listcategory]);
    }

    //Route pour afficher la categorie cliquée
    #[Route("/category/{id}", name: "show-category")]
    public function showCategory($id){
        $listcategory=$this->categoryTable();

        return $this->render('showCategory.html.twig', ['category' => $listcategory[$id]]);

    }
}
    

    