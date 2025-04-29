<?php

namespace App\Controller;

use App\Repository\cocktailsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

// importe l'exception utilisée pour générer une erreur 404
//NotFoundHttpException = une classe dans Symfony pour générer une erreur HTTP 404
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

class CocktailsController extends AbstractController
{
    //Router vers la page home
    //affichage les 2 cocktails les plus récents

    #[Route("/", name: "home")]
    public function home(){

        // je crée une instance de la classe cocktailsRepository 
        //et j'appelle la fct findAll pour récupérer la liste des cocktails
        $cocktailsRepository = new cocktailsRepository;
        $cocktails = $cocktailsRepository->findAll();

        usort($cocktails, function ($a, $b) {
            return $b['id'] - $a['id'];
        });
        
        $lastestcocktails = array_slice($cocktails, 0, 2);
        return $this->render('home.html.twig', ['cocktails' => $lastestcocktails]);

        //ou array_slice($cocktailsTable, -2, 2,true)
    }

    //Route vers la page qui affiche tous les cocktails
    #[Route("/listCocktails", name: "cocktails")]
    public function  listCocktails(){

        $cocktailsRepository = new cocktailsRepository;
        $cocktails = $cocktailsRepository->findAll();
       
        return $this->render('listCocktails.html.twig', ['cocktails' => $cocktails]);
    }

    //Route pour afficher un cocktail spécifique selon son id
    #[Route("/cocktail/{id}", name: "cocktail")]
    public function showCocktail($id){
        $cocktailsRepository = new cocktailsRepository;
        $cocktails = $cocktailsRepository->findAll();

        //Vérifie si le cocktail demandé existe bien dans le tableau, sinon affichage du message d'erreur
        if (!isset ($cocktails[$id])){
            throw new NotFoundHttpException("Cocktail avec l'ID $id introuvable.");
        }
        
        return $this->render('showCocktail.html.twig', ['cocktail' => $cocktails[$id]]);

    }
}
// OU //

// dans la fonction displaySingleCocktails, crééé un parametre $request.
// si j'ajoute devant ce parametre le nom d'une classe existante
// ça demande à symfony de créer une instance de cette (new NomDeLaClasse)
// automatiquement dans la variable $request
// c'est ce qu'on l'autowire (cablage automatique)

    // #[Route(path:"coctail, name : "cocktail")];
	// public function showCocktail(Request $request) {
    // $cocktailsTable = $this->cocktailsTable();

        // j'utilise l'instance de la classe Request créé par symfony
		// j'utilise la propriété query pour accéder aux données GET
		// j'utilise la fonction ->get pour récupérer un parametre en particulier


// Utilisation de la méthode query->get pour récupérer 
// le paramètre 'id' dans l'URL (par exemple : ?id=1)
	// 	$cocktailId = $request->query->get("id");

// Récupérer le cocktail correspondant
	// 	$cocktail = $cocktails[$cocktailId];

//Retourner le rendu de la vue avec le cocktail
	// 	return $this->render('showCocktail.html.twig', ['cocktail' => $cocktail]);





