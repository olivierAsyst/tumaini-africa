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
                'name' => 'Christian Matou',
                'role' => 'Animateur et journaliste',
                'bio' => '15 ans d\'expérience en développement Symfony. Passionné par l\'architecture logicielle et les bonnes pratiques.',
                'avatar' => 'https://randomuser.me/api/portraits/men/32.jpg',
                'social' => ['twitter', 'github', 'linkedin']
            ],
            [
                'name' => 'François Zihalirhwa',
                'role' => 'Blogueur professionnel',
                'bio' => 'Spécialiste en expérience utilisateur et design d\'interfaces modernes. Transforme le code en expériences mémorables.',
                'avatar' => 'https://randomuser.me/api/portraits/women/44.jpg',
                'social' => ['dribbble', 'behance', 'instagram']
            ],
            [
                'name' => 'Olivier Rukabo',
                'role' => 'Développeur Full-Stack',
                'bio' => 'Expert en JavaScript moderne et intégration frontend. Aime créer des interfaces fluides et réactives.',
                'avatar' => 'https://randomuser.me/api/portraits/men/67.jpg',
                'social' => ['github', 'codepen', 'twitter']
            ]
        ];

        $stats = [
            ['value' => '2022', 'label' => 'Année de création', 'icon' => 'calendar'],
            ['value' => '10K+', 'label' => 'Utilisateurs mensuels', 'icon' => 'users'],
            ['value' => '10K+', 'label' => 'Articles publiés', 'icon' => 'file-text'],
            ['value' => '98%', 'label' => 'Meilleurs commentaires', 'icon' => 'heart']
        ];

        $technologies = [
            'RDC', 'Kivu', 'International', 'Nord Kivu', 'Felix Tshisekedi',
            'FARDC', 'kinshasa', 'Football', 'Wazalendo', 'Goma', 'Uvira', 'Bukavu', 'Lubumbashi'
        ];

        return $this->render('about/index.html.twig', [
            'teamMembers' => $teamMembers,
            'stats' => $stats,
            'technologies' => $technologies
        ]);
    }
}
