<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:activityindicator/Resources/Private/Language/locallang_db.xlf:tx_activityindicator_domain_model_activityindicator',
        'label' => 'activity',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'versioningWS' => true,
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'enablecolumns' => [
        ],
        'searchFields' => 'activity',
        'iconfile' => 'EXT:activityindicator/Resources/Public/Icons/tx_activityindicator_domain_model_activityindicator.gif'
    ],
    'types' => [
        '1' => ['showitem' => 'activity, --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language, sys_language_uid, l10n_parent, l10n_diffsource'],
    ],
    'columns' => [
        'sys_language_uid' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.language',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'special' => 'languages',
                'items' => [
                    [
                        'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.allLanguages',
                        -1,
                        'flags-multiple'
                    ]
                ],
                'default' => 0,
            ],
        ],
        'l10n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.l18n_parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'default' => 0,
                'items' => [
                    ['', 0],
                ],
                'foreign_table' => 'tx_activityindicator_domain_model_activityindicator',
                'foreign_table_where' => 'AND {#tx_activityindicator_domain_model_activityindicator}.{#pid}=###CURRENT_PID### AND {#tx_activityindicator_domain_model_activityindicator}.{#sys_language_uid} IN (-1,0)',
            ],
        ],
        'l10n_diffsource' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],

        'activity' => [
            'exclude' => false,
            'label' => 'LLL:EXT:activityindicator/Resources/Private/Language/locallang_db.xlf:tx_activityindicator_domain_model_activityindicator.activity',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim,required',
                'default' => ''
            ],
        ],
    
    ],
];
