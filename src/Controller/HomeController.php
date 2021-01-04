<?php

namespace App\Controller;

use App\Entity\Category;
use App\Repository\CategoryRepository;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
* @Route("/", name="home.")
*/
class HomeController extends AbstractController
{
    /**
    * @Route("/", name="index")
    */
    public function index(CategoryRepository $categoryRepository, ProductRepository $productRepository): Response
    {
        $categories = $categoryRepository->findAll();
        // dd($categories);
        $products = $productRepository->findAll();

        return $this->render('home/index.html.twig', [
            'categories' => $categories,
            'products' => $products,
        ]);
    }

    /**
    * @Route("/category/{id}", name="products_category")
    */    
    public function productCategories(Category $category, ProductRepository $productRepository, CategoryRepository $categoryRepository) {
        $products = $productRepository->getProductsCategories($category);
        $categories = $categoryRepository->findAll();
        // dd($products);

        return $this->render('home/products_categories.html.twig', [
            'products' => $products,
            'categories' => $categories
        ]);
    }
}
