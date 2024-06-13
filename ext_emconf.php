<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Day Care Centers',
    'description' => 'This extensions lets create and show you records of day care centers',
    'category' => 'plugin',
    'author' => 'Stefan Froemken, Hoja Mustaffa Abdul Latheef',
    'author_email' => 'projects@jweiland.net',
    'author_company' => 'jweiland.net',
    'state' => 'stable',
    'version' => '6.0.0',
    'constraints' => [
        'depends' => [
            'typo3' => '12.4.0-12.4.99',
            'maps2' => '11.0.0-0.0.0',
        ],
        'conflicts' => [
        ],
        'suggests' => [
        ],
    ],
];
