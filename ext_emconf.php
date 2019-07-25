<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Day Care Centers',
    'description' => 'This extensions lets create and show you records of day care centers',
    'category' => 'plugin',
    'author' => 'Stefan Froemken',
    'author_email' => 'projects@jweiland.net',
    'author_company' => 'jweiland.net',
    'shy' => '',
    'priority' => '',
    'module' => '',
    'state' => 'stable',
    'internal' => '',
    'uploadfolder' => '1',
    'createDirs' => '',
    'modify_tables' => '',
    'clearCacheOnLoad' => 0,
    'lockType' => '',
    'version' => '3.0.0',
    'constraints' => [
        'depends' => [
            'typo3' => '8.7.0-9.5.99',
            'maps2' => '5.0.0-5.99.99'
        ],
        'conflicts' => [],
        'suggests' => []
    ]
];
