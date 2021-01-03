<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegisterUserFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class RegistrationController extends AbstractController
{
    /**
     * @Route("/register", name="register")
     */
    public function register(Request $request, UserPasswordEncoderInterface $passwordEncoder): Response
    {
        $user = new User();
        $form = $this->createForm(RegisterUserFormType::class, $user);
        $form->handleRequest($request);

        if($form->isSubmitted()) {
            // dd($user->getRoles());

            $user->setName($user->getName());
            $user->setEmail($user->getEmail());
            $user->setRoles($user->getRoles());
            $user->setPassword(
                $passwordEncoder->encodePassword($user, $user->getPassword())
            );

            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            return $this->redirect($this->generateUrl('app_login'));
        }

        return $this->render('registration/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
