<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class AboutController extends AbstractController
{
    #[Route('/about', name: 'app_about')]
    public function index(): Response
    {
        $teamMembers = [
            [
                'name' => 'Alexandre Martin',
                'role' => 'Fondateur & Lead Developer',
                'bio' => '15 ans d\'expérience en développement Symfony. Passionné par l\'architecture logicielle et les bonnes pratiques.',
                'avatar' => 'https://randomuser.me/api/portraits/men/32.jpg',
                'social' => ['twitter', 'github', 'linkedin']
            ],
            [
                'name' => 'Émilie Dubois',
                'role' => 'Designer UI/UX',
                'bio' => 'Spécialiste en expérience utilisateur et design d\'interfaces modernes. Transforme le code en expériences mémorables.',
                'avatar' => 'https://randomuser.me/api/portraits/women/44.jpg',
                'social' => ['dribbble', 'behance', 'instagram']
            ],
            [
                'name' => 'Thomas Leroy',
                'role' => 'Développeur Full-Stack',
                'bio' => 'Expert en JavaScript moderne et intégration frontend. Aime créer des interfaces fluides et réactives.',
                'avatar' => 'https://randomuser.me/api/portraits/men/67.jpg',
                'social' => ['github', 'codepen', 'twitter']
            ]
        ];

        $stats = [
            ['value' => '2015', 'label' => 'Année de création', 'icon' => 'calendar'],
            ['value' => '24K+', 'label' => 'Utilisateurs mensuels', 'icon' => 'users'],
            ['value' => '450+', 'label' => 'Articles publiés', 'icon' => 'file-text'],
            ['value' => '98%', 'label' => 'Satisfaction clients', 'icon' => 'heart']
        ];

        $technologies = [
            'Symfony 7', 'PHP 8.3', 'Tailwind CSS', 'Alpine.js', 
            'Docker', 'MySQL', 'Redis', 'AWS'
        ];

        return $this->render('about/index.html.twig', [
            'teamMembers' => $teamMembers,
            'stats' => $stats,
            'technologies' => $technologies
        ]);
    }
}
