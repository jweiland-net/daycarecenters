<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Day Care Centers',
    'description' => 'This extensions lets create and show you records of day care centers',
    'category' => 'plugin',
    'author' => 'Stefan Froemken',
    'author_email' => 'projects@jweiland.net',
    'author_company' => 'jweiland.net',
    'state' => 'stable',
    'version' => '5.0.0',
    'constraints' => [
        'depends' => [
            'typo3' => '10.4.36-11.5.99',
            'maps2' => '8.0.0-0.0.0',
        ],
        'conflicts' => [
        ],
        'suggests' => [
        ],
    ],
];
