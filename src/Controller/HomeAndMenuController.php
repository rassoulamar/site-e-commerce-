<?php

namespace App\Controller;

use App\Repository\CategorieRepository;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeAndMenuController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(ProductRepository $productRepository,CategorieRepository $categorieRepository):Response
    {

        $categories =$categorieRepository->findAll();
        $products = $productRepository->findAll();


        return $this->render('home/index.html.twig', [
            'categories'=>$categories,
            'products'=>$products,

        ]);
    }

    /**
     * @param CategorieRepository $categorieRepository
     * @return Response
     */
    public function getAllCategories(CategorieRepository $categorieRepository)
    {
        $categories =$categorieRepository->findAll();
        return $this->render('home/categories.html.twig', [
            'categories'=>$categories,
        ]);
    }


}


