<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegisterUserFormType;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class UserController extends AbstractController
{
    /**
     * @Route("/admin/user", name="user.index")
     */
    public function index(UserRepository $userRepository): Response
    {
        $users = $userRepository->findAll();

        return $this->render('user/index.html.twig', [
            'users' => $users
        ]);
    }

    /**
     * @Route("/user/show/{id}", name="user.show")
     */
    public function show(User $user) {
        return $this->render('user/show.html.twig', [
            'user' => $user
        ]);
    }

    /**
     * @Route("/admin/user/create", name="user.create")
     */
    public function create(Request $request, UserRepository $userRepository, UserPasswordEncoderInterface $passwordEncoder, ValidatorInterface $validator) {
        $user = new User();
        $form = $this->createForm(RegisterUserFormType::class, $user);
        $form->handleRequest($request);

        if($form->isSubmitted()) {
            $user->setName($user->getName());
            $user->setEmail($user->getEmail());
            $user->setRoles($user->getRoles());
            $user->setPassword(
                $passwordEncoder->encodePassword($user, $user->getPassword())
            );

            $errors = $validator->validate($user);
            if($form->isValid()) {

                $em = $this->getDoctrine()->getManager();
                $em->persist($user);
                $em->flush();
                $this->addFlash('success', 'User added successfuly');

                return $this->redirect($this->generateUrl('user.index'));
            } else {
                return $this->render('registration/index.html.twig', [
                    'errors' => $errors,
                    'form' => $form->createView()
                ]);
            }
        }

        return $this->render('registration/index.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/user/edit/{id}", name="user.edit")
     */
    public function edit(Request $request ,User $user, UserPasswordEncoderInterface $passwordEncoder, Security $security, ValidatorInterface $validator) {
        //getting cuurent user role to use it when rendering on sumbmit
        $currentUserRole = $security->getUser()->getRoles();
        $form = $this->createForm(RegisterUserFormType::class, $user);
        $form->handleRequest($request);

        if($form->isSubmitted()) {
            $user->setName($user->getName());
            $user->setEmail($user->getEmail());
            $user->setRoles($user->getRoles());
            $user->setPassword(
                $passwordEncoder->encodePassword($user, $user->getPassword())
            );

            //getting errors after validation
            $errors = $validator->validate($user);
            
            if($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($user);
                $em->flush();
                $this->addFlash('success', 'User Edited successfuly');
                
                //redirection page depending on the current authenticated user role
                if($currentUserRole[0] == "ROLE_ADMIN") {
                    return $this->redirect($this->generateUrl('user.index'));
                } else {
                    return $this->redirect($this->generateUrl('home.index'));
                }
            } else {
                //if form is not valid
                return $this->render('registration/index.html.twig', [
                    'errors' => $errors,
                    'form' => $form->createView()
                ]);
            }
        }

        return $this->render('registration/index.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/user/destroy/{id}", name="user.destroy")
     */
    public function destroy(User $user) {
        $em = $this->getDoctrine()->getManager();
        $em->remove($user);
        $em->flush();

        $this->addFlash('success', 'User deleted');

        return $this->redirect($this->generateUrl('user.index'));
    }
}
