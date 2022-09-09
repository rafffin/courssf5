<?php

namespace App\Twig;

use Twig\TwigFilter;
use App\Entity\Client;
use Twig\TwigFunction;
use Twig\Extension\AbstractExtension;

class Extension extends AbstractExtension{
    public function autorisations(Client $client)
    {
        $autorisations = "";
        foreach($client->getRoles() as $role) {
            $autorisations .= $autorisations ? ", " : "";
            switch($role){
                case "ROLE_ADMIN":
                    $autorisations .= "Administrateur";
                    break;

                case "ROLE_MODO":
                    $autorisations .= "Modérateur";
                    break;

                case "ROLE_CLIENT":
                    $autorisations .= "Client";

        
            }
        }
        return $autorisations;
    }

    /* EXO / AJOUTER UN FILTRE POUR AFFICHER LA CIVILITE CORRESPONDANT A LA LETTRE ENREGISTREE EN BD */
    public function getFilters()
    {
        return [
            new TwigFilter("autorisations", [$this, "autorisations"]),
        ];
    }
    public function getFunctions()
    {
        return [
            new TwigFunction("autorisations", [$this, "autorisations"]),
        ];
    }
    

}
