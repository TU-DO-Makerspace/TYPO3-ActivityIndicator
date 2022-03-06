<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'ActivityIndicator',
    'description' => 'An extension to display whether the TU-DO Makerspace is open.',
    'category' => 'plugin',
    'author' => 'Patrick Pedersen',
    'author_email' => 'ctx.xda@gmail.com',
    'state' => 'alpha',
    'clearCacheOnLoad' => 0,
    'version' => '1.0.0',
    'constraints' => [
        'depends' => [
            'typo3' => '10.4.0-10.4.99',
            'nnhelpers' => '1.4.0-0.0.0',
            'nnrestapi' => '1.0.0-0.0.0',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
];
