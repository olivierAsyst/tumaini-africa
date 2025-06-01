<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ClientPodcastController extends AbstractController
{
    #[Route('/podcasts', name: 'podcast_showcase')]
    public function showcase(): Response
    {
        $podcasts = [
            [
                'id' => '1',
                'title' => "L'Art de la Productivité",
                'duration' => 45,
                'dateAdded' => new \DateTime('2024-01-15'),
                'category' => 'Business & Carrière',
                'coverGradient' => 'from-purple-600',
                'description' => 'Découvrez les secrets des entrepreneurs les plus performants pour optimiser votre temps et atteindre vos objectifs.',
                'audioUrl' => '/audio/productivity.mp3'
            ],
            [
                'id' => '2',
                'title' => "Intelligence Artificielle : L'Avenir",
                'duration' => 32,
                'dateAdded' => new \DateTime('2024-01-14'),
                'category' => 'Technologie',
                'coverGradient' => 'from-cyan-500',
                'audioUrl' => '/audio/ai-future.mp3'
            ],
            [
                'id' => '3',
                'title' => 'Méditation & Bien-être',
                'duration' => 28,
                'dateAdded' => new \DateTime('2024-01-13'),
                'category' => 'Santé & Bien-être',
                'coverGradient' => 'from-green-500',
                'audioUrl' => '/audio/meditation.mp3'
            ]
        ];

        return $this->render('client_podcast/showcase.html.twig', [
            'podcasts' => $podcasts,
        ]);
    }

    /*#[Route('/client/podcast', name: 'app_client_podcast')]
    public function index(): Response
    {
        return $this->render('client_podcast/index.html.twig', [
            'controller_name' => 'ClientPodcastController',
        ]);
    }*/
}
