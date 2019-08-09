<?php

namespace App\Controller;

use App\Repository\CategorieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class SecurityController extends AbstractController
{
    /**
     * @Route("/security", name="security")
     */
    public function index(CategorieRepository  $categorieRepository)
    {
        $categories =$categorieRepository->findAll();
        return $this->render('security/index.html.twig', [
            'controller_name' => 'SecurityController',
            'categories'=>$categories,

        ]);
    }
}
