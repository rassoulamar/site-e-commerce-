<?php

namespace App\Controller;

use App\Repository\CategorieRepository;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FrontMenuController extends AbstractController
{
    /**
     * @Route("/menu/{category_slug}",name="menu_categorie")
     * @param $category_slug
     * @param ProductRepository $productRepository
     * @param CategorieRepository $categorieRepository
     * @return Response
     */
    public function menu($category_slug, ProductRepository $productRepository, CategorieRepository $categorieRepository): Response
    {

        $categories = $categorieRepository->findAll();
        $category = $categorieRepository->findby(['slug' => $category_slug]);
        $products = $productRepository->findby(['categorie' => $category]);
        if (!$category) {
            throw $this->createNotFoundException("la categorie n'existe pas ");}

        return $this->render('home/menu.html.twig', [
            'categories' => $categories,
            'products' => $products,
            'category' => $category,

        ]);
    }

    /**
     * @Route("/menu/{categorie_slug}/{product_slug}", name="category_product_slug")
     * @param $product_slug
     * @param ProductRepository $productRepository
     * @param CategorieRepository $categorieRepository
     * @return Response
     */


    public function product_detail_page($categorie_slug, $product_slug, ProductRepository $productRepository, CategorieRepository $categorieRepository): Response
    {
        $categories = $categorieRepository->findAll();
        $category = $categorieRepository->findby(['slug' => $categorie_slug]);
        $products = $productRepository->findby(['slug' => $product_slug]);
        dump($products);
        if (!$products) {
            throw $this->createNotFoundException('The product does not exist');}

        return $this->render('home/product_detail_page.html.twig', [
            'categories' => $categories,
            'products' => $products,
            'category' => $category,


        ]);
    }

}
