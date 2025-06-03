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
            'firstName' => 'Alexandre',
            'lastName' => 'Martin',
            'bio' => 'Développeur Symfony senior avec 8 ans d\'expérience. Passionné par les bonnes pratiques, les tests et l\'architecture propre.',
            'location' => 'Paris, France',
            'website' => 'alexmartin-dev.com',
            'social' => [
                'twitter' => '@alex_martin',
                'github' => 'alexmartin-dev'
            ],
            'stats' => [
                'articles' => 24,
                'followers' => 156,
                'following' => 42
            ]
        ];

        // Génération des articles
        $allArticles = $this->generateArticles();
        
        // Pagination
        $articlesPerPage = 6;
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
            'Les meilleures pratiques Symfony 7 en 2024',
            'Comment migrer de Symfony 6 à 7 sans stress',
            'Tailwind CSS: le guide complet pour Symfony',
            'Dockeriser une application Symfony professionnelle',
            'Les nouveautés de PHP 8.3 pour les développeurs Symfony',
            'Créer des APIs REST robustes avec API Platform',
            'Les design patterns indispensables en PHP',
            'Sécurité web: protéger son application Symfony',
            'Tests unitaires avancés avec PHPUnit',
            'Performance: optimiser son application Symfony',
            'Les bundles Symfony à connaître en 2024',
            'Déploiement continu avec GitHub Actions',
            'Event Sourcing avec Symfony',
            'Domain Driven Design: mise en pratique',
            'Les erreurs courantes à éviter avec Doctrine'
        ];

        $categories = [
            'Symfony', 'PHP', 'Docker', 'Performance', 'Sécurité', 
            'Tests', 'Architecture', 'Frontend', 'DevOps'
        ];

        for ($i = 0; $i < 15; $i++) {
            $articles[] = [
                'title' => $titles[$i],
                'image' => 'https://source.unsplash.com/random/600x400/?programming,'.$i,
                'date' => new \DateTime('-' . rand(0, 365) . ' days'),
                'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...',
                'category' => $categories[array_rand($categories)],
                'readTime' => rand(3, 15) . ' min read',
                'likes' => rand(5, 150)
            ];
        }

        // Tri par date
        usort($articles, fn($a, $b) => $b['date'] <=> $a['date']);

        return $articles;
    }
}
