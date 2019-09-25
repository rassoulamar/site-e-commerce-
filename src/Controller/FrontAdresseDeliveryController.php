<?php

namespace App\Controller;

use App\Entity\Panier;
use App\Entity\User;
use App\Form\AdresseType;
use App\Form\ChangeAdresseDeliveryType;
use App\Form\RegisterType;
use App\Repository\UserRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class FrontAdresseDeliveryController extends AbstractController
{
    /**
     * @Route("/validate-adresse-delivry", name="adresse_delivery")
     */
    public function index(Request $request, EntityManagerInterface $entityManager,ObjectManager $manager)
    {

        $user = $this->getUser();
        $adress = $user->getAdress();
        $form =$this->createForm(AdresseType::class, $adress);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $manager->persist($adress);
            $manager->flush();
            return $this->redirectToRoute('security_login');
        }

        return $this->render('adresse_delivery/index.html.twig', [
            'adress' => $adress,
            'form'=>$form->createView(),
        ]);
    }
}
