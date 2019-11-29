<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class UserController extends AbstractController
{
    /**
     * @Route("/user", name="user")
     */
    public function inscription(Request $request, UserPasswordEncoderInterface $encoder)
    {
        $inscripton = new User();
        $inscripton->setRoles(["ROLE_USER"]);
        
        $form =  $this->createForm(UserType::class , $inscripton);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $hash = $encoder->encodePassword($inscripton, $inscripton->getPassword());
            $inscripton->setPassword($hash);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($inscripton);
            $entityManager->flush();
            return $this->redirectToRoute('app_login');
        }

        return $this->render('user/inscription.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    
}
