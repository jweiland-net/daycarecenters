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
    'version' => '2.0.0',
    'constraints' => [
        'depends' => [
            'typo3' => '8.7.0-8.7.99',
            'maps2' => '2.9.0-2.9.99'
        ],
        'conflicts' => [],
        'suggests' => []
    ]
];
