<?php

namespace App\Repository;

use App\Entity\Category;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Category>
 */
class CategoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Category::class);
    }

    public function findTopCategoriesWithMostArticles(int $limit = 5): array
    {
        return $this->createQueryBuilder('c')
            ->select('c', 'COUNT(a.id) as articleCount')
            ->leftJoin('c.articles', 'a', 'WITH', 'a.isPublished = true')
            ->groupBy('c.id')
            ->orderBy('articleCount', 'DESC')
            ->addOrderBy('c.name', 'ASC')
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();
    }

    /*public function findTopCategoriesWithMostArticles(int $limit = 6, $articlesPerCategory = 4): array{
        
    // Récupère les catégories les plus populaires
        $categories = $this->createQueryBuilder('c')
            ->select('c', 'COUNT(a.id) as articleCount')
            ->leftJoin('c.articles', 'a', 'WITH', 'a.isPublished = true')
            ->groupBy('c.id')
            ->orderBy('articleCount', 'DESC')
            ->addOrderBy('c.name', 'ASC')
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();

        // Pour chaque catégorie, charge les articles récents
        $results = [];
        foreach ($categories as $category) {
            $categoryEntity = $category[0];
            $recentArticles = $this->getEntityManager()
                ->getRepository('App\Entity\Article')
                ->createQueryBuilder('a')
                ->where('a.category = :category')
                ->andWhere('a.isPublished = true')
                ->setParameter('category', $categoryEntity)
                ->orderBy('a.publishedAt', 'DESC')
                ->setMaxResults($articlesPerCategory)
                ->getQuery()
                ->getResult();

            $results[] = [
                'category' => $categoryEntity,
                'articleCount' => $category['articleCount'],
                'recentArticles' => $recentArticles
            ];
        }

        return $results;
    }*/

    //    /**
    //     * @return Category[] Returns an array of Category objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('c')
    //            ->andWhere('c.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('c.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Category
    //    {
    //        return $this->createQueryBuilder('c')
    //            ->andWhere('c.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
