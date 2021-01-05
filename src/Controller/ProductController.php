<?php

namespace App\Controller;

use App\Entity\Image;
use App\Entity\Product;
use App\Entity\Size;
use App\Form\CreateProductFormType;
use App\Form\EditProductFormType;
use App\Repository\ImageRepository;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
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
        $sizes = $productRepository->getSizes($product);

        return $this->render('product/show.html.twig', [
            'product' => $product,
            'images' => $images,
            'sizes' => $sizes
        ]);
    }


    /**
    * @Route("admin/product/create", name="product.create")
    */
    public function create(Request $request, ValidatorInterface $validator) {
        $product = new Product();
        $form = $this->createForm(CreateProductFormType::class, $product);
        $form->handleRequest($request);
        $errors = $validator->validate($product);

        if($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($product);
            
            //getting other tables data from form
            $files = $form['images']->getData();
            $small = $form['small']->getData();
            $medium = $form['medium']->getData();
            $large = $form['large']->getData();

            $size = new Size();
            $size->setSmall($small);
            $size->setMedium($medium);
            $size->setLarge($large);
            $size->setProduct($product);
            $em->persist($size);

            // dd($small);
            $mainImage = '';
            foreach($files as $file) {
                $image = new Image();
                $fileName = md5(uniqid()) . '.' . $file->guessClientExtension();
                $file->move(
                    $this->getParameter('uploads_dir'),
                    $fileName
                );
                $mainImage = $fileName;
                $image->setImage($fileName);
                $image->setProduct($product);
                $em->persist($image);
            }

            //handling multiple sizes


            $product->setMainImage($mainImage);
            $em->persist($product);
            $em->flush();
            $this->addFlash('success', 'Product added successfuly');

            return $this->redirect($this->generateUrl('product.index'));
        } else {
            return $this->render('product/create.html.twig', [
                'form' => $form->createView(),
                'errors' => $errors,
            ]);
        }


        return $this-> render('product/create.html.twig', [
            'form' => $form->createView()
        ]);
    }


    /**
    * @Route("admin/product/edit/{id}", name="product.edit")
    */
    public function edit(Request $request, Product $product, ProductRepository $productRepository) {
        $form = $this->createForm(EditProductFormType::class, $product);
        $form->handleRequest($request);
        if($form->isSubmitted()) {
            $em = $this->getDoctrine()->getManager();
            
            $sizes = $productRepository->getSizes($product);

            $size = new Size();

            $small = $sizes["small"];
            $medium = $sizes["medium"];
            $large = $sizes["large"];
            $size->setSmall($small);
            $size->setMedium($medium);
            $size->setLarge($large);
            $size->setProduct($product);
            $em->persist($size);

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
