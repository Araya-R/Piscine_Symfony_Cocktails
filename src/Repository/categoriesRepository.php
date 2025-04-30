<?php

namespace App\Repository;

class CategoriesRepository
{
    public function findAll()
    {
        $categories = [
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

        return $categories;
    }

    public function FindOnebyID($id){

        $categories = $this->findAll();
        $category = $categories[$id];
        
        return $category;
    }
}
