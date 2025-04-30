<?php

namespace App\Controller;

use App\Repository\CocktailsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Cocktail;
use Symfony\Component\HttpFoundation\Request;
//=require sur la page où on a créé la class Cocktail pour pouvoir l'utiliser

// importe l'exception utilisée pour générer une erreur 404
//NotFoundHttpException = une classe dans Symfony pour générer une erreur HTTP 404
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

class CocktailsController extends AbstractController
{
    //Router vers la page home
    //affichage les 2 cocktails les plus récents
    #[Route("/", name: "home")]
    public function home(CocktailsRepository $cocktailsRepository)
    {
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
    public function  listCocktails(CocktailsRepository $cocktailsRepository)
    {
        $cocktails = $cocktailsRepository->findAll();
        return $this->render('listCocktails.html.twig', ['cocktails' => $cocktails]);
    }

    //Route pour afficher un cocktail spécifique selon son id
    #[Route("/cocktail/{id}", name: "cocktail")]

    //injecter automatiquement l'instance de classe CocktailsRepository dans la méthode showCocktail
    //grâce à l'autowiring
    public function showCocktail($id, CocktailsRepository $cocktailsRopository)
    {
        $cocktail = $cocktailsRopository->FindOneById($id);
        return $this->render('showCocktail.html.twig', ['cocktail' => $cocktail]);
    }

    #[Route("/create-cocktail", name: "create-cocktail")]
    public function createCocktail(Request $request)
    {
        //je vérifie si le formulaire a été soumis (via Post)
        if ($request->isMethod('POST')) {
            $name = $request->request->get('name');
            $description = $request->request->get('description');
            $ingredients = $request->request->get('ingredients');
            $image = $request->request->get('image');

            //Je crée un objet Cocktail
            $cocktail = new Cocktail($name, $description, $ingredients, $image);

        }
        return $this->render('createCocktail.html.twig', ['cocktail' =>$cocktail]);
    
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
