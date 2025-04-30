<?php

namespace App\Controller;

use App\Repository\CategoriesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
   
    //Route vers la page qui affiche toutes les catégories
    #[Route("/category", name: "category")]
    public function  listcategory(){
        $categoriesRepository =  new categoriesRepository;
        $categories =  $categoriesRepository->findAll();

        return $this->render('category.html.twig',['category' =>$categories]);
    }

    //Route pour afficher la categorie cliquée
    #[Route("/category/{id}", name: "show-category")]
    public function showCategory($id){
        $categoriesRepository =  new categoriesRepository;
        $categories =  $categoriesRepository->findAll();

        return $this->render('showCategory.html.twig', ['category' => $categories[$id]]);

    }
}
    

    