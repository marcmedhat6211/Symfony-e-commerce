<?php

namespace App\Controller;

use App\Entity\Image;
use App\Entity\Product;
use App\Form\CreateProductFormType;
use App\Form\EditProductFormType;
use App\Repository\ImageRepository;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/product", name="product.")
 */
class ProductController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(ProductRepository $productRepository): Response
    {
        $products = $productRepository->findAll();

        return $this->render('product/index.html.twig', [
            'products' => $products
        ]);
    }


    /**
     * @Route("/show/{id}", name="show")
     */
    public function show(Product $product, ProductRepository $productRepository) {
        $images = $productRepository->getImages($product);
        // dd($images);

        return $this->render('product/show.html.twig', [
            'product' => $product,
            'images' => $images
        ]);
    }


    /**
    * @Route("/create", name="create")
    */
    public function create(Request $request) {
        $product = new Product();
        $form = $this->createForm(CreateProductFormType::class, $product);
        $form->handleRequest($request);

        if($form->isSubmitted()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($product);
            
            //handling multiple images
            $files = $form['images']->getData();
            foreach($files as $file) {
                $image = new Image();
                $fileName = md5(uniqid()) . '.' . $file->guessClientExtension();
                $file->move(
                    $this->getParameter('uploads_dir'),
                    $fileName
                );
                $image->setImage($fileName);
                $image->setProduct($product);
                $em->persist($image);
            }
            $em->flush();
            $this->addFlash('success', 'Product added successfuly');

            return $this->redirect($this->generateUrl('product.index'));
        }


        return $this-> render('product/create.html.twig', [
            'form' => $form->createView()
        ]);
    }


    /**
    * @Route("/edit/{id}", name="edit")
    */
    public function edit(Request $request, Product $product) {
        $form = $this->createForm(EditProductFormType::class, $product);
        $form->handleRequest($request);
        if($form->isSubmitted()) {
            $em = $this->getDoctrine()->getManager();


            // $files = $form['images']->getData();
            // foreach($files as $file) {
            //     $image = new Image();
            //     $fileName = md5(uniqid()) . '.' . $file->guessClientExtension();
            //     $file->move(
            //         $this->getParameter('uploads_dir'),
            //         $fileName
            //     );
            //     $image->setImage($fileName);
            //     $image->setProduct($product);
            //     $em->persist($image);
            // }

            $em->flush();
            $this->addFlash('success', 'Product Edited successfuly');
            return $this->redirect($this->generateUrl('product.index'));
        }


        return $this-> render('product/edit.html.twig', [
            'form' => $form->createView()
        ]);
    }

    
    /**
    * @Route("/destroy/{id}", name="destroy")
    */
    public function destroy(Product $product) {
        $em = $this->getDoctrine()->getManager();
        $em->remove($product);
        $em->flush();

        $this->addFlash('success', 'Product deleted');

        return $this->redirect($this->generateUrl('product.index'));
    }
}
