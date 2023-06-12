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
    'version' => '3.0.1-dev',
    'constraints' => [
        'depends' => [
            'typo3' => '11.5.27-11.5.99',
            'backend' => '11.5.27-11.5.99',
            'fluid' => '11.5.27-11.5.99',
        ],
        'conflicts' => [
            'qc_be_pagelanguage' => '1.0.0-9.9.99'
        ],
        'suggests' => [],
    ],
];
