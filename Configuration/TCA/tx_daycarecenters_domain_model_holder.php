<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:daycarecenters/Resources/Private/Language/locallang_db.xlf:tx_daycarecenters_domain_model_holder',
        'label' => 'title',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'dividers2tabs' => true,
        'default_sortby' => 'ORDER BY title',
        'versioningWS' => 2,
        'versioning_followPages' => true,
        'origUid' => 't3_origuid',
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime'
        ],
        'searchFields' => 'title,contact_person,street,zip,city,telephone,fax,email,website',
        'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath(
                'daycarecenters'
            ) . 'Resources/Public/Icons/tx_daycarecenters_domain_model_holder.gif'
    ],
    'interface' => [
        'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, title, contact_person, street, house_number, zip, city, telephone, fax, email, website, logo'
    ],
    'types' => [
        '1' => [
            'showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, title, contact_person,
            street, house_number, zip, city, telephone, fax, email, website, logo,
            --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.tabs.access, 
            --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.palettes.access;access'
        ]
    ],
    'palettes' => [
        'access' => [
            'showitem' => 'starttime;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:starttime_formlabel,endtime;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:endtime_formlabel',
        ]
    ],
    'columns' => [
        'sys_language_uid' => [
            'exclude' => true,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'special' => 'languages',
                'items' => [
                    [
                        'LLL:EXT:lang/locallang_general.xlf:LGL.allLanguages',
                        -1,
                        'flags-multiple'
                    ],
                ],
                'default' => 0,
            ]
        ],
        'l10n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'exclude' => true,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.l18n_parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['', 0],
                ],
                'foreign_table' => 'tx_daycarecenters_domain_model_holder',
                'foreign_table_where' => 'AND tx_daycarecenters_domain_model_holder.pid=###CURRENT_PID### AND tx_daycarecenters_domain_model_holder.sys_language_uid IN (-1,0)',
                'showIconTable' => false,
                'default' => 0,
            ]
        ],
        'l10n_diffsource' => [
            'config' => [
                'type' => 'passthrough',
                'default' => ''
            ]
        ],
        't3ver_label' => [
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.versionLabel',
            'config' => [
                'type' => 'input',
                'size' => '30',
                'max' => '255'
            ]
        ],
        'hidden' => [
            'exclude' => true,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
            'config' => [
                'type' => 'check',
                'items' => [
                    '1' => [
                        '0' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:hidden.I.0'
                    ]
                ]
            ]
        ],
        'starttime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.starttime',
            'config' => [
                'type' => 'input',
                'size' => '13',
                'eval' => 'datetime',
                'default' => 0
            ],
            'l10n_mode' => 'exclude',
            'l10n_display' => 'defaultAsReadonly'
        ],
        'endtime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.endtime',
            'config' => [
                'type' => 'input',
                'size' => '13',
                'eval' => 'datetime',
                'default' => 0,
                'range' => [
                    'upper' => mktime(0, 0, 0, 1, 1, 2038)
                ]
            ],
            'l10n_mode' => 'exclude',
            'l10n_display' => 'defaultAsReadonly'
        ],
        'title' => [
            'exclude' => true,
            'label' => 'LLL:EXT:daycarecenters/Resources/Private/Language/locallang_db.xlf:tx_daycarecenters_domain_model_holder.title',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ]
        ],
        'contact_person' => [
            'exclude' => true,
            'label' => 'LLL:EXT:daycarecenters/Resources/Private/Language/locallang_db.xlf:tx_daycarecenters_domain_model_holder.contact_person',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ]
        ],
        'street' => [
            'exclude' => true,
            'label' => 'LLL:EXT:daycarecenters/Resources/Private/Language/locallang_db.xlf:tx_daycarecenters_domain_model_holder.street',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ]
        ],
        'house_number' => [
            'exclude' => true,
            'label' => 'LLL:EXT:daycarecenters/Resources/Private/Language/locallang_db.xlf:tx_daycarecenters_domain_model_holder.house_number',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ]
        ],
        'zip' => [
            'exclude' => true,
            'label' => 'LLL:EXT:daycarecenters/Resources/Private/Language/locallang_db.xlf:tx_daycarecenters_domain_model_holder.zip',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ]
        ],
        'city' => [
            'exclude' => true,
            'label' => 'LLL:EXT:daycarecenters/Resources/Private/Language/locallang_db.xlf:tx_daycarecenters_domain_model_holder.city',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ]
        ],
        'telephone' => [
            'exclude' => true,
            'label' => 'LLL:EXT:daycarecenters/Resources/Private/Language/locallang_db.xlf:tx_daycarecenters_domain_model_holder.telephone',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ]
        ],
        'fax' => [
            'exclude' => true,
            'label' => 'LLL:EXT:daycarecenters/Resources/Private/Language/locallang_db.xlf:tx_daycarecenters_domain_model_holder.fax',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ]
        ],
        'email' => [
            'exclude' => true,
            'label' => 'LLL:EXT:daycarecenters/Resources/Private/Language/locallang_db.xlf:tx_daycarecenters_domain_model_holder.email',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ]
        ],
        'website' => [
            'exclude' => true,
            'label' => 'LLL:EXT:daycarecenters/Resources/Private/Language/locallang_db.xlf:tx_daycarecenters_domain_model_holder.website',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'wizards' => [
                    '_PADDING' => 2,
                    'link' => [
                        'type' => 'popup',
                        'title' => 'Link',
                        'icon' => 'link_popup.gif',
                        'script' => 'browse_links.php?mode=wizard',
                        'JSopenParams' => 'height=300,width=500,status=0,menubar=0,scrollbars=1',
                        'module' => [
                            'name' => 'wizard_link'
                        ]
                    ]
                ],
                'softref' => 'typolink[linkList]'
            ]
        ],
        'logo' => [
            'exclude' => true,
            'label' => 'LLL:EXT:daycarecenters/Resources/Private/Language/locallang_db.xlf:tx_daycarecenters_domain_model_holder.logo',
            'config' => [
                'type' => 'group',
                'internal_type' => 'file',
                'uploadfolder' => 'uploads/tx_daycarecenters',
                'show_thumbs' => 1,
                'size' => 5,
                'allowed' => $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext'],
                'disallowed' => '',
                'minitems' => 0,
                'maxitems' => 1
            ]
        ]
    ]
];
