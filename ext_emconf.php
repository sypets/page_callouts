<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Page Messages',
    'description' => 'Add callouts to page module in TYPO3 backend',
    'category' => 'module',
    'author' => 'Sybille Peters',
    'author_email' => 'sypets@gmx.de',
    'author_company' => '',
    'state' => 'stable',
    'version' => '4.0.0',
    'constraints' => [
        'depends' => [
            'typo3' => '11.5.30-12.4.99',
            'backend' => '11.5.30-12.4.99',
            'fluid' => '11.5.30-12.4.99',
        ],
        'conflicts' => [
            'qc_be_pagelanguage' => '1.0.0-9.9.99'
        ],
        'suggests' => [],
    ],
];
