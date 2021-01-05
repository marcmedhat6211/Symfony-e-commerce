<?php

namespace App\Repository;

use App\Entity\Category;
use App\Entity\Product;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Product|null find($id, $lockMode = null, $lockVersion = null)
 * @method Product|null findOneBy(array $criteria, array $orderBy = null)
 * @method Product[]    findAll()
 * @method Product[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Product::class);
    }

    public function getImages(Product $product) {
        $conn = $this->getEntityManager()->getConnection();
        $id = $product->getId();
        $sql = 'SELECT image
                FROM image i
                WHERE i.product_id = :id'
                ;
        $stmt = $conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        $arrays = $stmt->fetchAllAssociative();
        $images = [];
        foreach($arrays as $array) {
            if(isset($array["image"])) {
                array_push($images, $array["image"]);
            }
        }

        return $images;
    }

    public function getSizes(Product $product) {
        $conn = $this->getEntityManager()->getConnection();
        $id = $product->getId();
        $sql = 'SELECT small, medium, large
                FROM size s
                WHERE s.product_id = :id'
                ;
        $stmt = $conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        $arrays = $stmt->fetchAllAssociative();
        $sizes = $arrays[0];

        return $sizes;
    }

    public function getProductsCategories(Category $category) {
        $conn = $this->getEntityManager()->getConnection();
        $id = $category->getId();
        $sql = 'SELECT *
                FROM product p
                WHERE p.category_id = :id'
                ;
        $stmt = $conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        $products = $stmt->fetchAllAssociative();

        return $products;
    }

    public function editSizes(Product $product, $small, $medium, $large) {
        $conn = $this->getEntityManager()->getConnection();
        $id = $product->getId();
        $sql = 'UPDATE size s
                SET s.small = :small, s.medium = :medium, s.large = :large
                WHERE s.product_id = :id'
                ;
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            'id' => $id,
            'small' => $small,
            'medium' => $medium,
            'large' => $large
            ]);
    }

    public function editImages(Product $product, $image) {
        $conn = $this->getEntityManager()->getConnection();
        $id = $product->getId();
        $sql_update = 'UPDATE image i
                SET i.image = :image
                WHERE i.product_id = :id'
        ;
        $stmt = $conn->prepare($sql_update);
        $stmt->execute([
            'id' => $id,
            'image' => $image
        ]);
    }

    // /**
    //  * @return Product[] Returns an array of Product objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Product
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
