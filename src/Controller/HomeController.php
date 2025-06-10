<?php

namespace App\Controller;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

final class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(ArticleRepository $articleRepo, EntityManagerInterface $em, SluggerInterface $slugger): Response
    {
        $last_urgent_articles = $articleRepo->findThreeLatestUrgent();
        $podcasts = [
            [
                'id' => '1',
                'title' => "L'Art de la Productivité",
                'duration' => 45,
                'dateAdded' => new \DateTime('2024-01-15'),
                'category' => 'Business & Carrière',
                'coverGradient' => 'https://tumainiafricanews.info/wp-content/uploads/2025/05/IMG-20250521-WA0122.jpg',
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

        $newsItems = [
            [
                'id' => 1,
                'image' => 'https://tumainiafricanews.info/wp-content/uploads/2025/05/IMG-20250529-WA0101.jpg',
                'title' => 'Mwenga : Poursuite du projet « Savoirs, Droits et Leadership » pour faire face aux changements climatiques »',
                'date' => '15 Déc 2024',
                'link' => '/article/1'
            ],
            [
                'id' => 2,
                'image' => 'https://images.unsplash.com/photo-1581833971358-2c8b550f87b3?w=400&h=300&fit=crop',
                'title' => 'Environnement : nouvelles mesures pour le climat',
                'date' => '15 Déc 2024',
                'link' => '/article/1'
            ],
            [
                'id' => 3,
                'image' => 'https://prod.cdn-medias.jeuneafrique.com/cdn-cgi/image/q=auto,f=auto,metadata=none,width=1215,fit=cover/https://prod.cdn-medias.jeuneafrique.com/medias/2010/12/19/019122010112627000000mazembe.jpg',
                'title' => 'Sport : résultats des championnats internationaux',
                'date' => '15 Déc 2024',
                'link' => '/article/1'
            ],
            [
                'id' => 4,
                'image' => 'https://images.unsplash.com/photo-1504711434969-e33886168f5c?w=400&h=300&fit=crop',
                'title' => 'Culture : exposition d\'art contemporain à Paris',
                'date' => '15 Déc 2024',
                'link' => '/article/1'
            ],
            [
                'id' => 5,
                'image' => 'https://tumainiafricanews.info/wp-content/uploads/2025/05/IMG-20250531-WA0020.jpg',
                'title' => 'C\'est faux, les chrétiens de l\'église Catholique du Diocèse d\'Uvira n\'ont pas écrit une lettre demandant la suspension de l\'Archevêque de Bukavu.',
                'date' => '15 Déc 2024',
                'link' => '/article/1'
            ],
            [
                'id' => 6,
                'image' => 'https://tumainiafricanews.info/wp-content/uploads/2025/05/Screenshot_20250531-111511.jpg',
                'title' => 'Un adolescent de 16 ans se donne la mort par pendaison à Bulinzi 2',
                'date' => '15 Déc 2024',
                'link' => '/article/1'
            ],
        ];
        

        return $this->render('home/index.html.twig', [
            'controller_name' => 'Acceuil !',
            'urgents' => $last_urgent_articles,
            'podcasts' => $podcasts,
            'newsItems' => $newsItems
        ]);
    }

}
