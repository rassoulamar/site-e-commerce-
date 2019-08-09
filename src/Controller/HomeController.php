<?php

namespace App\Controller;

use App\Repository\CategorieRepository;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(ProductRepository $productRepository,CategorieRepository $categorieRepository):Response
    {

        $categories =$categorieRepository->findAll();
        $products = $productRepository->findAll();
        dump($products);

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'categories'=>$categories,
            'products'=>$products,
        ]);
    }
}


/*
        $productDetails = $this->getDoctrine()->getRepository(ProductDetails::class);
        $list_productDetails = $productDetails->findBy(['new' => true], null, 4);
        $all_productDetails = $productDetails->findAll();
        shuffle($all_productDetails);

        if(empty($list_productDetails)){
            $list_productDetails = $productDetails->findBy([],null,4);
        }

        dump($list_productDetails);

        return $this->render('home/index.html.twig', [
            'all_productDetails' => $all_productDetails,
            'list_productDetails' => $list_productDetails,
            'controller_name' => 'HomeController',
            'products' => $productsRepository->findAll(),
            'categories' => $categoriesRepository->findAll(),
            'subcategories' => $subCategoriesRepository->findAll(),
        ]);*/