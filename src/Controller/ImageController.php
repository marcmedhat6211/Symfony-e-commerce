<?php

namespace App\Controller;

use App\Entity\Image;
use App\Entity\Product;
use App\Form\EditProductFormType;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ImageController extends AbstractController
{
    /**
     * @Route("/admin/image/destroy/{image}", name="image.destroy")
     */
    public function destroy(ProductRepository $productRepository) {
        $url = $_SERVER['REQUEST_URI'];
        $image = basename($url);
        $product_id_array = $productRepository->getProductIdByImageName($image);
        $product_id = $product_id_array[0]["product_id"];
        $productRepository->deleteImage($image);
        $this->addFlash('success', 'Image deleted');

        return $this->redirect($this->generateUrl('product.edit', [
            'id' => $product_id
        ]));
    }
}
