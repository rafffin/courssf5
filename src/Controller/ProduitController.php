<?php

namespace App\Controller;

use App\Entity\Produit;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class ProduitController extends AbstractController
{
    #[Route('/produit', name: 'app_produit')]
    public function index(): Response
    {
        return $this->render('produit/index.html.twig', [
            'controller_name' => 'ProduitController',
        ]);
    }

    #[Route('/produit/{id}', name: 'app_produit-fiche', requirements:["id" => "\d+"])]
    public function fiche(Produit $produit): Response
    {
        return $this->render('produit/fiche.html.twig', [
            'produit' => $produit,
        ]);
    }
}
