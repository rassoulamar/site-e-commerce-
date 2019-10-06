<?php

namespace App\Controller;

use App\Entity\Adresse;
use App\Entity\User;
use App\Form\AdresseType;
use App\Form\EditProfileType;
use App\Form\LogonType;
use App\Form\RegisterType;
use App\Form\UserType;
use App\Repository\CategorieRepository;
use App\Repository\UserRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Tests\Functional\Bundle\CsrfFormLoginBundle\Form\UserLoginType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AdminSecurityController extends AbstractController
{
    /**
     * @Route("/register", name="security_register")
     */
    public function register(Request $request, ObjectManager $manager, UserPasswordEncoderInterface $encoder)
    {
        $user = new User();
        $form =$this->createForm(RegisterType::class, $user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $hash= $encoder->encodePassword($user,$user->getPassword());
            $user->setPassword($hash);
            $manager->persist($user);
            $manager->flush();
            return $this->redirectToRoute('security_login');
        }

        return $this->render('security/register.html.twig', [
            'form'=>$form->createView(),
        ]);
    }

    /**
     * @Route("/profile",name="my_account")
     */
    public function index()
    {
        return $this->render('security/profile/index.html.twig');
    }



    /**
     * @Route("/profile/edit/{id}", name="profile_edit", methods={"GET"})
     */
    public function show(Request $request,User $user,UserPasswordEncoderInterface $encoder)
    {
        $form = $this->createForm(EditProfileType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
//            $hash= $encoder->encodePassword($user,$user->getPassword());
//            $user->setPassword($hash);
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('my_account');
        }

        return $this->render('security/profile/edit.html.twig',[
            'form' => $form->createView(),
        ]);

    }


    /**
     * @Route("/login", name="security_login")
     */
    public function login(){

        return $this->render('security/login.html.twig');
    }

    /**
     * @Route("/logout",name="security_logout")
     */
    public function logout(){}
}
