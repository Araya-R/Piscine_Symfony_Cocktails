<?php

namespace App\Repository;

//
class cocktailsRepository
{
    // la méthode findAll me retourne la liste des cocktails
    public function findAll()
    {
        $cocktails = [
            1 => [
                'id'            => 1,
                'nom'           => 'Mojito',
                'image'         => 'https://www.1001cocktails.com/wp-content/uploads/1001cocktails/2023/03/81659_origin-scaled-2048x1366.jpg',
                'ingredients'   => [
                    '50 ml de rhum blanc',
                    '½ citron vert (en quartiers)',
                    '2 c.à.c. de sucre de canne',
                    '8 feuilles de menthe fraîche',
                    'Eau pétillante',
                    'Glace pilée'
                ],
                'date_creation' => '1942-01-01',
                'description'   => 'Classique cubain ultra-rafraîchissant mêlant menthe et citron vert.'
            ],

            2 => [
                'id'            => 2,
                'nom'           => 'Margarita',
                'image'         => 'https://cbimg.cookinbreak.com/recettes/zF6CVSTCf7Jc.jpg',
                'ingredients'   => [
                    '50 ml de tequila',
                    '25 ml de triple sec (Cointreau)',
                    '25 ml de jus de citron vert frais',
                    'Sel pour givrer le verre',
                    'Glace'
                ],
                'date_creation' => '1938-07-04',
                'description'   => 'Tequila, triple-sec et citron vert dans un verre givré de sel pour un équilibre acidulé-salé.'
            ],

            3 => [
                'id'            => 3,
                'nom'           => 'Old Fashioned',
                'image'         => 'https://cache.larvf.com/data/photo/w1200_h630_ci/6v/cocktail-old-fashioned.jpg',
                'ingredients'   => [
                    '60 ml de bourbon ou rye whisky',
                    '1 morceau de sucre',
                    '2 traits d’angostura bitters',
                    'Zeste d’orange',
                    'Glaçon gros format'
                ],
                'date_creation' => '1880-05-15',
                'description'   => 'Icône des classiques : un whisky subtilement sucré et aromatisé aux bitters.'
            ],

            4 => [
                'id'            => 4,
                'nom'           => 'Piña Colada',
                'image'         => 'https://www.oldnick.fr/wp-content/uploads/2020/02/cocktail-pina-colada-scaled.jpg',
                'ingredients'   => [
                    '60 ml de rhum blanc',
                    '90 ml de jus d’ananas',
                    '30 ml de crème de coco',
                    'Glaçons'
                ],
                'date_creation' => '1954-08-16',
                'description'   => 'Spécialité portoricaine crémeuse et fruitée à base d’ananas et de coco.'
            ],

            5 => [
                'id'            => 5,
                'nom'           => 'Negroni',
                'image'         => 'https://assets.tmecosys.com/image/upload/t_web_rdp_recipe_584x480_1_5x/img/recipe/ras/Assets/1D4CCB7D-D830-4ED3-9535-875D10CFC801/Derivates/DAD3AE52-E326-4309-90BA-10F6BEEB1EC7.jpg',
                'ingredients'   => [
                    '30 ml de gin',
                    '30 ml de vermouth rouge',
                    '30 ml de Campari',
                    'Zeste d’orange',
                    'Glaçon gros format'
                ],
                'date_creation' => '1919-06-01',
                'description'   => 'Amertume élégante et notes d’agrumes pour ce grand classique italien.'
            ]
        ];

        return $cocktails;
    }
}
