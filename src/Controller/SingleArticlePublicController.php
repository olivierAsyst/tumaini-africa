<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class SingleArticlePublicController extends AbstractController
{
    #[Route('/article/public', name: 'app_single_article_public')]
    public function index(): Response
    {
        $article = [
            'title' => 'Le PSG champion d\'Europe : comment assister aux célébrations du titre ce dimanche',
            'subtitle' => 'Les supporters parisiens pourront célébrer le premier titre européen de l\'histoire du club lors d\'une grande fête organisée place de la République',
            'category' => 'Sports',
            'subcategory' => 'Football',
            'team' => 'PSG',
            'author' => [
                'name' => 'Antoine Guillot',
                'role' => 'Journaliste sport'
            ],
            'publishedAt' => new \DateTime('2025-06-01 14:30:00'),
            'updatedAt' => new \DateTime('2025-06-01 16:45:00'),
            'readingTime' => 3,
            'mainImage' => [
                'url' => 'https://images.unsplash.com/photo-1574629810360-7efbbe195018?w=1200&h=600&fit=crop',
                'alt' => 'Célébrations des supporters du PSG après la victoire en Champions League',
                'caption' => 'Les supporters du PSG célèbrent le premier titre européen de l\'histoire du club'
            ],
            'content' => [
                [
                    'type' => 'paragraph',
                    'text' => 'Après des décennies d\'attente, le Paris Saint-Germain a enfin décroché son premier titre en Ligue des Champions. Cette victoire historique contre le Real Madrid (2-1) samedi soir au Stade de France a provoqué des scènes de liesse dans tout Paris.'
                ],
                [
                    'type' => 'paragraph',
                    'text' => 'Pour permettre aux supporters de célébrer dignement ce moment historique, la Ville de Paris et le club parisien ont organisé une grande fête populaire ce dimanche à partir de 15h place de la République.'
                ],
                [
                    'type' => 'heading',
                    'text' => 'Un dispositif exceptionnel mis en place'
                ],
                [
                    'type' => 'paragraph',
                    'text' => 'Les autorités ont prévu un dispositif de sécurité renforcé pour accueillir les dizaines de milliers de supporters attendus. La place de la République sera entièrement dédiée aux célébrations, avec plusieurs écrans géants diffusant les meilleurs moments de la finale.'
                ],
                [
                    'type' => 'quote',
                    'text' => 'C\'est un moment historique pour notre club et nos supporters méritent de le célébrer dans les meilleures conditions',
                    'author' => 'Nasser Al-Khelaïfi, Président du PSG'
                ],
                [
                    'type' => 'paragraph',
                    'text' => 'L\'équipe au complet sera présente pour présenter le trophée aux supporters. Les joueurs prendront la parole tour à tour pour remercier les fans de leur soutien indéfectible tout au long de cette campagne européenne exceptionnelle.'
                ],
                [
                    'type' => 'heading',
                    'text' => 'Les héros de la finale à l\'honneur'
                ],
                [
                    'type' => 'paragraph',
                    'text' => 'Kylian Mbappé, auteur des deux buts de la victoire, et Gianluigi Donnarumma, héros dans les cages avec plusieurs arrêts décisifs, seront particulièrement mis à l\'honneur lors de cette cérémonie.'
                ]
            ],
            'tags' => ['PSG', 'Ligue des Champions', 'Football', 'Célébrations', 'Paris'],
            'relatedArticles' => [
                [
                    'title' => 'PSG-Real Madrid : les notes des joueurs parisiens',
                    'url' => '#',
                    'image' => 'https://images.unsplash.com/photo-1551698618-1dfe5d97d256?w=300&h=200&fit=crop'
                ],
                [
                    'title' => 'Mbappé : "C\'est le plus beau jour de ma carrière"',
                    'url' => '#',
                    'image' => 'https://images.unsplash.com/photo-1579952363873-27d3bfad9c0d?w=300&h=200&fit=crop'
                ],
                [
                    'title' => 'Comment Paris a vécu cette finale historique',
                    'url' => '#',
                    'image' => 'https://images.unsplash.com/photo-1551524164-6cf6ac833fb1?w=300&h=200&fit=crop'
                ]
            ]
        ];

        return $this->render('single_article_public/index.html.twig', [
            'article' => $article,
            'controller_name' => 'SingleArticlePublicController'
        ]);
    }
}
