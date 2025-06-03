<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ClientUserArticleController extends AbstractController
{
    #[Route('/client/user/article/{page}', name: 'app_client_user_article', requirements: ['page' => '\d+'], defaults: ['page' => 1])]
    public function index(int $page = 1): Response
    {
        // Données utilisateur
        $user = [
            'avatar' => 'https://randomuser.me/api/portraits/men/32.jpg',
            'firstName' => 'Jean',
            'lastName' => 'Dupont',
            'bio' => 'Développeur web passionné par Symfony et les nouvelles technologies. J\'aime partager mes connaissances à travers mes articles.'
        ];

        // Génération des articles statiques
        $allArticles = $this->generateArticles();

        // Pagination
        $articlesPerPage = 5;
        $totalArticles = count($allArticles);
        $totalPages = ceil($totalArticles / $articlesPerPage);
        $paginatedArticles = array_slice($allArticles, ($page - 1) * $articlesPerPage, $articlesPerPage);

        return $this->render('client_user_article/index.html.twig', [
            'user' => $user,
            'articles' => $paginatedArticles,
            'currentPage' => $page,
            'totalPages' => $totalPages,
        ]);
    }

    private function generateArticles(): array
    {
        $articles = [];
        $titles = [
            'Les meilleures pratiques Symfony 7',
            'Tailwind CSS avec Symfony',
            'Docker pour les développeurs PHP',
            'Les nouveautés de PHP 8.3',
            'Optimiser les performances Symfony',
            'Créer des APIs REST avec Symfony',
            'Les design patterns en PHP',
            'Sécurité web: les bases à connaître',
            'Tests unitaires avec PHPUnit',
            'Migration de Symfony 6 à 7'
        ];

        $images = [
            'https://source.unsplash.com/random/400x300/?symfony',
            'https://source.unsplash.com/random/400x300/?programming',
            'https://source.unsplash.com/random/400x300/?docker',
            'https://source.unsplash.com/random/400x300/?php',
            'https://source.unsplash.com/random/400x300/?performance',
            'https://source.unsplash.com/random/400x300/?api',
            'https://source.unsplash.com/random/400x300/?design',
            'https://source.unsplash.com/random/400x300/?security',
            'https://source.unsplash.com/random/400x300/?test',
            'https://source.unsplash.com/random/400x300/?upgrade'
        ];

        for ($i = 0; $i < 10; $i++) {
            $articles[] = [
                'title' => $titles[$i],
                'image' => $images[$i],
                'date' => new \DateTime('-' . $i . ' days'),
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam in dui mauris. Vivamus hendrerit arcu sed erat molestie vehicula.'
            ];
        }

        return $articles;
    }
}
