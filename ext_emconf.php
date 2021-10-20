<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Static Info Tables (de]',
    'description' => 'German (de] language pack for the Static Info Tables providing localized names for countries, currencies and so on.',
    'category' => 'misc',
    'version' => '6.7.8',
    'state' => 'stable',
    'clearCacheOnLoad' => true,
    'author' => 'Franz Holzinger',
    'author_email' => 'franz@ttproducts.de',
    'author_company' => 'jambage.com',
    'constraints' => [
        'depends' => [
            'typo3' => '10.4.11-11.5.99',
            'static_info_tables' => '6.7.3-6.99.99',
        ],
        'conflicts' => [
        ],
        'suggests' => [
        ],
    ],
];
