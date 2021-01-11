<?php

namespace App\Controller;

use App\Entity\Accessory;
use App\Entity\Image;
use App\Entity\Product;
use App\Form\CreateProductFormType;
use App\Form\EditProductFormType;
use App\Repository\AccessoryRepository;
use App\Repository\ProductRepository;
use App\Services\FileUploader;
use Doctrine\Common\Collections\ArrayCollection;
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
        //getting the entity manager
        $em = $this->getDoctrine()->getManager();
        $product = new Product();

        //original accessories
        $originalAccessory = new ArrayCollection();
        foreach($product->getAccessory() as $accessory) {
            $originalAccessory->add($accessory);
        }

        //creating the form
        $form = $this->createForm(CreateProductFormType::class, $product);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            //setting product's values
            $product->setName($form["name"]->getData());
            $product->setDescription($form["description"]->getData());
            $product->setCategory($form["category"]->getData());
            $product->setPrice($form["price"]->getData());
            //images
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
            $product->setMainImage($mainImage);
            //get rid of the ones that the user got rid of in the interface
            foreach($originalAccessory as $accessory) {
                if($product->getAccessory()->contains($accessory) == false) {
                    $em->remove($accessory);
                }
            }
            $product->setCode($form["code"]->getData());
            $product->setStock($form["stock"]->getData());
            $product->setAvailability($form["availability"]->getData());

            // $em->clear();
            $em->persist($product);
            $em->flush();

            $this->addFlash('success', 'Product added successfuly');
            return $this->redirect($this->generateUrl('product.index'));
        } else {
            return $this->render('product/create.html.twig', [
                'form' => $form->createView(),
                // 'errors' => $errors,
            ]);
        }

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
    public function destroy(Product $product, AccessoryRepository $accessoryRepository) {
        $em = $this->getDoctrine()->getManager();
        $accessories = $accessoryRepository->getProductAccessory($product);
        foreach($accessories as $accessory) {
            $em->remove($accessory);
        }
        $em->remove($product);
        $em->flush();   
        $this->addFlash('success', 'Product deleted');
        
        return $this->redirect($this->generateUrl('product.index'));
    }

    /**
     * @Route("search", name="product.search")
     */
    public function searchAction(Request $request, ProductRepository $productRepository) {
        $requestString = $request->get('q');
        $requestCode = $request->get('q');
        $products = $productRepository->findEntitiesByName($requestString);
        $productsByCode = $productRepository->findEntitiesByCode($requestCode);
        // dd($productRepository->findEntitiesByCode('1234'));
        if(!$products) {
            $result['products']['error'] = "Product name not found";
        } else {
            $result['products'] = $this->getRealEntities($products);
        }

        if(!$productsByCode) {
            $result['productsByCode']['error'] = "Product code not found";
        } else {
            $result['productsByCode'] = $this->getRealEntities($productsByCode);
        }

        return new Response(json_encode($result));
    }

    public function getRealEntities($products) {
        foreach($products as $products) {
            $realEntities[$products->getId()] = [$products->getName(), $products->getCode()];
        }

        return $realEntities;
    }
}
