<?php

namespace App\Controller;

use App\Entity\Panier;
use App\Entity\PanierProduct;
use App\Entity\Product;
use App\Entity\User;
use App\Repository\CategorieRepository;
use App\Repository\PanierRepository;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class FrontPanierController extends AbstractController
{
    /**
     * @Route("/panier", name="panier")
     */
    public function index()
    {
        $panier = $this->get('session')->get('panier');

        return $this->render('panier/index.html.twig', [
            'panier' => $panier,
        ]);
    }

    /**
     * @param Request $request
     * @param EntityManagerInterface $entityManager
     * @return Response
     * @throws \Exception
     * @Route("/panier/ajout-produit", name="add-product")

     */
    public function addToPanier(Request $request, EntityManagerInterface $entityManager)
    {
        $produitId = $request->query->get('produitId');
        $quantite = $request->query->get('quantite');
        $price = $request->query->get('price');
        $image = $request->query->get('image');
        $name = $request->query->get('name');

        $session = $this->get('session');

        if(!$session->get('panier')) {
            $session->set('panier', []);
        }

        $panier = $session->get('panier');

        $panier[$produitId]['quantite'] = isset($panier[$produitId]['quantite']) ? $panier[$produitId]['quantite'] + $quantite : $quantite;
        $panier[$produitId]['price'] = $price;
        $panier[$produitId]['image'] = $image;
        $panier[$produitId]['name'] = $name;


        $session->set('panier', $panier);
//
//        $quantite = $panier[$produitId]['quantite'];
//
//        // Insertion en base
//        /** @var User $user */
//        $user = $this->getUser();
//        $panier = $user->getPanier();
//        if(!$panier) {
//            $panier = new Panier();
//            $panier->setUser($user)->setCreatedAt(new \DateTime('now'));
//        }
//        $entityManager->persist($panier);
//        $entityManager->flush();
//
//        $productRepository = $entityManager->getRepository(Product::class);
//        $product = $productRepository->find($produitId);
//
//        $panierProductProduct = $entityManager->getRepository(PanierProduct::class);
//        $panierProduct = $panierProductProduct->findOneBy([
//            'panier'    => $panier,
//            'product'   => $product,
//        ]);
//
//        $panierProduct = $panierProduct ? : new PanierProduct();
//        $panierProduct
//            ->setPanier($panier)
//            ->setProduct($product)
//            ->setQuantity($quantite)
//        ;
//
//        $entityManager->persist($panierProduct);
//        $entityManager->flush();

        return new Response();
    }

    /**
     * @param Request $request
     * @return Response
     * @Route("/panier/erase-panier", name="erase-panier")
     */
    public function erasePanier(Request $request){

        $session = $this->get('session');
        $panier= [];
        $session->set('panier', $panier);

        return new Response();

    }
}

