<?php
function getArr()
{
    $articles = [
        'article_1' => [
            'nom' => 'Article 1',
            'prix' => 300,
            'img' => 'article1.jpg',
            'poids' => 100
        ],
        'article_2' => [
            'nom' =>  'Article 2',
            'prix' => 400,
            'img' => 'article2.jpg',
            'poids' => 1500
        ],
        'article_3' => [
            'nom' => 'Article 3',
            'prix' => 150,
            'img' => 'article3.jpg',
            'poids' => 650
        ],
        'article_4' => [
            'nom' => 'Article 4',
            'prix' => 300,
            'img' => 'article4.jpg',
            'poids' => 50
        ],
        'article_5' => [
            'nom' => 'Article 5',
            'prix' => 50,
            'img' => 'article5.jpg',
            'poids' => 1200
        ],
        'article_6' => [
            'nom' => 'Article 6',
            'prix' => 500,
            'img' => 'article6.jpg',
            'poids' => 250
        ]
    ];

    return $articles;
}