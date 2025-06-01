<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class CateryPubliController extends AbstractController
{
    #[Route('/category/politique', name: 'app_category_public')]
    public function index(): Response
    {
        $lastNewsInCategory = [
            [
                'id' => 1,
                'title' => 'Major Economic Summit Concludes with Historic Trade Agreements',
                'subtitle' => 'Global leaders forge new partnerships for sustainable growth',
                'content' => 'World economic leaders have reached unprecedented agreements on trade partnerships, setting the stage for a new era of international cooperation and sustainable development.',
                'image' => 'https://images.unsplash.com/photo-1611348586804-61bf6c080437?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80',
                'category' => 'Politics',
                'date' => '2024-06-01',
                'author' => 'Michael Chen',
                'readTime' => '5 min read',
                'link' => '#'
            ],
            [
                'id' => 2,
                'title' => 'Revolutionary AI Technology Transforms Healthcare Diagnosis',
                'subtitle' => 'New machine learning system achieves 99% accuracy in early disease detection',
                'content' => 'Breakthrough artificial intelligence technology is revolutionizing medical diagnosis, offering unprecedented accuracy in detecting diseases at their earliest stages.',
                'image' => 'https://images.unsplash.com/photo-1559757148-5c350d0d3c56?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80',
                'category' => 'Technology',
                'date' => '2024-05-31',
                'author' => 'Dr. Sarah Johnson',
                'readTime' => '7 min read',
                'link' => '#'
            ],
            [
                'id' => 3,
                'title' => 'Climate Initiative Achieves Milestone in Renewable Energy',
                'subtitle' => 'Solar and wind power now supply 60% of national energy grid',
                'content' => 'A major environmental milestone has been reached as renewable energy sources now provide the majority of power to the national electrical grid.',
                'image' => 'https://images.unsplash.com/photo-1466611653911-95081537e5b7?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80',
                'category' => 'Environment',
                'date' => '2024-05-30',
                'author' => 'Emma Rodriguez',
                'readTime' => '4 min read',
                'link' => '#'
            ],
            [
                'id' => 4,
                'title' => 'International Space Mission Discovers Water on Distant Planet',
                'subtitle' => 'Scientists confirm liquid water presence on potentially habitable exoplanet',
                'content' => 'A groundbreaking space discovery has confirmed the presence of liquid water on an exoplanet located in the habitable zone of its star system.',
                'image' => 'https://images.unsplash.com/photo-1446776653964-20c1d3a81b06?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80',
                'category' => 'Science',
                'date' => '2024-05-29',
                'author' => 'Prof. David Kim',
                'readTime' => '6 min read',
                'link' => '#'
            ],
            [
                'id' => 5,
                'title' => 'Global Education Reform Shows Remarkable Success',
                'subtitle' => 'New teaching methods improve student performance by 40% worldwide',
                'content' => 'Educational systems worldwide are seeing dramatic improvements following the implementation of innovative teaching methodologies and digital learning platforms.',
                'image' => 'https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80',
                'category' => 'Education',
                'date' => '2024-05-28',
                'author' => 'Lisa Thompson',
                'readTime' => '3 min read',
                'link' => '#'
            ]
        ];
        
        return $this->render('catery_publi/index.html.twig', [
            'lastNewsInCategory' => $lastNewsInCategory
        ]);
    }
}
