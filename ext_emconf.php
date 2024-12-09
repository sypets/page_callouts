<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Page Messages',
    'description' => 'Add callouts to page module in TYPO3 backend',
    'category' => 'module',
    'author' => 'Sybille Peters',
    'author_email' => 'sypets@gmx.de',
    'author_company' => '',
    'state' => 'stable',
    'version' => '6.1.2',
    'uploadfolder' => 0,
    'createDirs' => '',
    'clearCacheOnLoad' => 0,
    'constraints' => [
        'depends' => [
            'typo3' => '12.4.10-13.4.99',
            'backend' => '12.4.10-13.4.99',
            'fluid' => '12.4.10-13.4.99',
        ],
        'conflicts' => [
            'qc_be_pagelanguage' => '1.0.0-1.0.1'
        ],
        'suggests' => [],
    ],
];
