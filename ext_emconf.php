<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Page Messages',
    'description' => 'Add callouts to page module in TYPO3 backend',
    'category' => 'module',
    'author' => 'Sybille Peters',
    'author_email' => 'sypets@gmx.de',
    'author_company' => '',
    'state' => 'stable',
    'uploadfolder' => 0,
    'createDirs' => '',
    'clearCacheOnLoad' => 0,
    'version' => '2.0.4-dev',
    'constraints' => [
        'depends' => [
            'typo3' => '10.4.0-11.5.99',
            'backend' => '10.4.0-11.5.99',
            'fluid' => '10.4.0-11.5.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
];
