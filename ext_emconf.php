<?php
$EM_CONF[$_EXTKEY] = [
    'title' => 'Page Messages',
    'description' => 'Add flash messages to page module in TYPO3 backend',
    'category' => 'module',
    'author' => 'Sybille Peters',
    'author_email' => 'sypets@gmx.de',
    'author_company' => '',
    'state' => 'stable',
    'uploadfolder' => 0,
    'createDirs' => '',
    'clearCacheOnLoad' => 0,
    'version' => '1.0.1',
    'constraints' => [
        'depends' => [
            'typo3' => '9.5.0-10.4.99',
            'backend' => '9.5.0-10.4.99',
            'fluid' => '9.5.0-10.4.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
];
