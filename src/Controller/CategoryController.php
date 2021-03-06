<?php

namespace App\Controller;

use App\Entity\Category;
use App\Form\CreateCategoryFormType;
use App\Form\EditCategoryFormType;
use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
* @Route("/admin/category", name="category.")
*/
class CategoryController extends AbstractController
{
    /**
    * @Route("/", name="index")
    */
    public function index(CategoryRepository $categoryRepository): Response
    {
        $categories = $categoryRepository->findAll();

        return $this->render('category/index.html.twig', [
            'categories' => $categories
        ]);
    }


    /**
    * @Route("/create", name="create")
    */
    public function create(Request $request, ValidatorInterface $validator) {
        $category = new Category();
        $form = $this->createForm(CreateCategoryFormType::class, $category);
        $form->handleRequest($request);
        $errors = $validator->validate($category);
        if($form->isSubmitted() && count($errors)  == 0) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($category);
            $em->flush();
            $this->addFlash('success', 'Category added successfuly');
            return $this->redirect($this->generateUrl('category.index'));
        } else {
            return $this-> render('category/create.html.twig', [
                'form' => $form->createView(),
                'errors' => $errors
            ]);
        }


        return $this-> render('category/create.html.twig', [
            'form' => $form->createView()
        ]);
    }


    /**
    * @Route("/edit/{id}", name="edit")
    */
    public function edit(Request $request, Category $category) {
        $form = $this->createForm(EditCategoryFormType::class, $category);
        $form->handleRequest($request);
        if($form->isSubmitted()) {
            $em = $this->getDoctrine()->getManager();
            $em->flush();
            $this->addFlash('success', 'Category updated successfuly');
            return $this->redirect($this->generateUrl('category.index'));
        }


        return $this-> render('category/edit.html.twig', [
            'form' => $form->createView()
        ]);
    }

    
    /**
    * @Route("/destroy/{id}", name="destroy")
    */
    public function destroy(Category $category) {
        $em = $this->getDoctrine()->getManager();
        $em->remove($category);
        $em->flush();

        $this->addFlash('success', 'Category deleted');

        return $this->redirect($this->generateUrl('category.index'));
    }
}
