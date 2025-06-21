<?php

namespace App\Controller;

use App\Repository\AudioRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ClientPodcastController extends AbstractController
{
    #[Route('/podcasts', name: 'app_podcast_index')]
    public function index(AudioRepository $audioRepository): Response
    {

        $audios = $audioRepository->findAll();
        return $this->render('client_podcast/index.html.twig', [
            'audios' => $audios
        ]);
    }


    public function show(int $id): Response
    {
        // Pour notre exemple, nous utilisons un audio statique
        $audio = [
            'id' => $id,
            'title' => 'Analyse de l\'actualité internationale',
            'description' => 'Un point complet sur les enjeux géopolitiques de la semaine avec nos experts. Discussion sur les tensions au Moyen-Orient, les accords commerciaux entre l\'Europe et l\'Asie, et l\'impact des élections américaines sur la politique mondiale. 
            
            Notre équipe d\'analystes internationaux décrypte les événements marquants et vous offre des clés de compréhension pour mieux saisir les dynamiques en cours sur la scène internationale.
            
            Au programme de cette émission :
            - Les négociations sur le nucléaire iranien
            - Le sommet du G20 et ses conséquences
            - L\'évolution des relations sino-américaines
            - Les défis sécuritaires en Afrique subsaharienne',
            'duration' => 45,
            'publishedAt' => new \DateTime('-1 days'),
            'author' => ['id' => 3, 'name' => 'Jean Dupont', 'avatar' => 'https://randomuser.me/api/portraits/men/32.jpg', 'bio' => 'Journaliste et analyste politique spécialisé dans les relations internationales. Ancien correspondant à Washington et Bruxelles.'],
            'category' => ['id' => 1, 'name' => 'Politique', 'slug' => 'politique'],
            'cover' => 'https://images.unsplash.com/photo-1478737270239-2f02b77fc618?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
            'file' => 'https://samplelib.com/lib/preview/mp3/sample-9s.mp3'
        ];
        
        // Récupération des commentaires (dans un environnement réel, nous les récupérerions depuis la base de données)
        $comments = [
            [
                'id' => 1,
                'content' => 'Excellente analyse sur les relations sino-américaines. J\'aurais toutefois aimé plus de détails sur les implications pour l\'Union Européenne.',
                'createdAt' => new \DateTime('-1 day 6 hours'),
                'author' => ['name' => 'Claire Martin', 'avatar' => 'https://randomuser.me/api/portraits/women/28.jpg'],
                'likes' => 7,
                'dislikes' => 0
            ],
            [
                'id' => 2,
                'content' => 'Très bon podcast comme d\'habitude. La partie sur les défis sécuritaires en Afrique était particulièrement instructive.',
                'createdAt' => new \DateTime('-1 day 2 hours'),
                'author' => ['name' => 'Marc Dubois', 'avatar' => 'https://randomuser.me/api/portraits/men/54.jpg'],
                'likes' => 4,
                'dislikes' => 1
            ],
        ];
        
        // Récupération des podcasts similaires
        $similarAudios = [
            [
                'id' => 2,
                'title' => 'Débat : L\'avenir des énergies renouvelables',
                'description' => 'Discussion entre experts sur les perspectives des énergies vertes à l\'horizon 2030.',
                'duration' => 38,
                'publishedAt' => new \DateTime('-3 days'),
                'author' => ['name' => 'Marie Lefebvre'],
                'category' => ['name' => 'Environnement', 'slug' => 'environnement'],
                'cover' => 'https://images.unsplash.com/photo-1473341304170-971dccb5ac1e?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80'
            ],
            [
                'id' => 3,
                'title' => 'Les avancées de l\'intelligence artificielle',
                'description' => 'Tour d\'horizon des dernières innovations en matière d\'IA et leurs applications concrètes.',
                'duration' => 52,
                'publishedAt' => new \DateTime('-5 days'),
                'author' => ['name' => 'Thomas Martin'],
                'category' => ['name' => 'Technologie', 'slug' => 'technologie'],
                'cover' => 'https://images.unsplash.com/photo-1526378800651-c32d170fe6f8?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80'
            ],
        ];
        
        return $this->render('client_podcast/show.html.twig', [
            'audio' => $audio,
            'comments' => $comments,
            'similarAudios' => $similarAudios,
        ]);
    }

}