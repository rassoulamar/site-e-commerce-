<?php

namespace App\Controller;

use App\Repository\CategorieRepository;
use App\Repository\PanierRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class PanierController extends AbstractController
{
    /**
     * @Route("/panier", name="panier")
     */
    public function index(SessionInterface $session, PanierRepository $panierRepository, CategorieRepository $categorieRepository)
    {
        $categories = $categorieRepository->findAll();
        $session->start();
        $panierIden = $session->getId();
        $panier = $panierRepository->findAll();
        dump($panierIden);
        dump($panier);

        return $this->render('panier/index.html.twig', [
            'panier' => $panier,
            'categories'=> $categories,
        ]);
    }
}
