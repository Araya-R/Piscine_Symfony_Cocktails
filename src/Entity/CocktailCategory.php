<?php

namespace App\Entity;

//j'importe le namespace de Doctrine ORM
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class CocktailCategory{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column (type:'integer')]
    public ?int $id = null;

    #[ORM\Column (length:250)]
    public ?string $name = null;

    #[ORM\Column (type:'datetime')]
    public ?\DateTime $createdAt = null;

    #[ORM\Column (length:250)]
    public ?string $description = null;

}