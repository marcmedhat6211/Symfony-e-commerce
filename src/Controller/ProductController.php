<?php

namespace App\Controller;

use App\Entity\Image;
use App\Entity\Product;
use App\Form\CreateProductFormType;
use App\Form\EditProductFormType;
use App\Repository\ProductRepository;
use App\Services\FileUploader;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class ProductController extends AbstractController
{
    /**
     * @Route("admin/product", name="product.index")
     */
    public function index(ProductRepository $productRepository): Response
    {
        $products = $productRepository->findAll();

        return $this->render('product/index.html.twig', [
            'products' => $products
        ]);
    }


    /**
     * @Route("product/show/{id}", name="product.show")
     */
    public function show(Product $product, ProductRepository $productRepository) {
        $images = $productRepository->getImages($product);

        return $this->render('product/show.html.twig', [
            'product' => $product,
            'images' => $images,
        ]);
    }


    /**
    * @Route("admin/product/create", name="product.create")
    */
    public function create(Request $request, ValidatorInterface $validator, FileUploader $fileUploader) {
        $product = new Product();
        $form = $this->createForm(CreateProductFormType::class, $product);
        $form->handleRequest($request);

        //validating product entity
        $errors = $validator->validate($product);

        if($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($product);
            
            //getting images and sizes data from form
            $files = $form['images']->getData();

            $mainImage = '';
            foreach($files as $file) {
                $image = new Image();
                $fileName = $fileUploader->uploadFile($file);
                $mainImage = $fileName;
                $image->setImage($fileName);
                $image->setProduct($product);
                $em->persist($image);
            }

            //setting the main image that appears in the home page for the user
            $product->setMainImage($mainImage);
            $em->persist($product);
            $em->flush();
            $this->addFlash('success', 'Product added successfuly');

            return $this->redirect($this->generateUrl('product.index'));
        //if there are any form validation errors from products entity
        } else {
            return $this->render('product/create.html.twig', [
                'form' => $form->createView(),
                'errors' => $errors,
            ]);
        }

        //rendering the create form once the create route is hit
        return $this-> render('product/create.html.twig', [
            'form' => $form->createView()
        ]);
    }


    /**
    * @Route("admin/product/edit/{id}", name="product.edit")
    */
    public function edit(
        Request $request, 
        Product $product, 
        ProductRepository $productRepository, 
        ValidatorInterface $validator,
        FileUploader $fileUploader
        ) {
        $form = $this->createForm(EditProductFormType::class, $product);
        $images = $productRepository->getImages($product);

        $form->handleRequest($request);

        //getting the errors from validation
        $errors = $validator->validate($product);

        //checking if the form is submitted and valid
        if($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            //editing image entity
            $files = $form['images']->getData();
            foreach($files as $file) {
                $image = new Image();
                $fileName = $fileUploader->uploadFile($file);
                $image->setImage($fileName);
                $image->setProduct($product);
                $em->persist($image);
            }

            $em->flush();
            $this->addFlash('success', 'Product Edited successfuly');
            return $this->redirect($this->generateUrl('product.index'));
        } else {
            return $this->render('product/edit.html.twig', [
                'form' => $form->createView(),
                'errors' => $errors,
                'images' => $images
            ]);
        }

        return $this-> render('product/edit.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    
    /**
     * @Route("admin/product/destroy/{id}", name="product.destroy")
     */
    public function destroy(Product $product) {
        $em = $this->getDoctrine()->getManager();
        $em->remove($product);
        $em->flush();   
        $this->addFlash('success', 'Product deleted');
        
        return $this->redirect($this->generateUrl('product.index'));
    }
}
