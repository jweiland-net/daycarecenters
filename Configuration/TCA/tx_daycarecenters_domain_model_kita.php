<?php
if (\TYPO3\CMS\Core\Utility\GeneralUtility::compat_version('7.6')) {
    $ttContentLanguageFile = 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf';
} else {
    $ttContentLanguageFile = 'LLL:EXT:cms/locallang_ttc.xlf';
}
return [
    'ctrl' => [
        'title' => 'LLL:EXT:daycarecenters/Resources/Private/Language/locallang_db.xlf:tx_daycarecenters_domain_model_kita',
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
        'searchFields' => 'title,leader,street,zip,city,email,website,food_info,closing_days,response_times,facebook,twitter,google',
        'iconfile' => 'EXT:daycarecenters/Resources/Public/Icons/tx_daycarecenters_domain_model_kita.gif'
    ],
    'columns' => [
        'sys_language_uid' => [
            'exclude' => 1,
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
            'exclude' => 1,
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.l18n_parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    [
                        '',
                        0
                    ]
                ],
                'foreign_table' => 'tt_content',
                'foreign_table_where' => 'AND tt_content.pid=###CURRENT_PID### AND tt_content.sys_language_uid IN (-1,0)',
                'default' => 0
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
            'exclude' => 1,
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
            'exclude' => 1,
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
            'exclude' => 1,
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
            'exclude' => 1,
            'label' => 'LLL:EXT:daycarecenters/Resources/Private/Language/locallang_db.xlf:tx_daycarecenters_domain_model_kita.title',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ]
        ],
        'leader' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:daycarecenters/Resources/Private/Language/locallang_db.xlf:tx_daycarecenters_domain_model_kita.leader',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ]
        ],
        'street' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:daycarecenters/Resources/Private/Language/locallang_db.xlf:tx_daycarecenters_domain_model_kita.street',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ]
        ],
        'house_number' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:daycarecenters/Resources/Private/Language/locallang_db.xlf:tx_daycarecenters_domain_model_kita.house_number',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ]
        ],
        'zip' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:daycarecenters/Resources/Private/Language/locallang_db.xlf:tx_daycarecenters_domain_model_kita.zip',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ]
        ],
        'city' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:daycarecenters/Resources/Private/Language/locallang_db.xlf:tx_daycarecenters_domain_model_kita.city',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ]
        ],
        'email' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:daycarecenters/Resources/Private/Language/locallang_db.xlf:tx_daycarecenters_domain_model_kita.email',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ]
        ],
        'website' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:daycarecenters/Resources/Private/Language/locallang_db.xlf:tx_daycarecenters_domain_model_kita.website',
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
        'telephones' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:daycarecenters/Resources/Private/Language/locallang_db.xlf:tx_daycarecenters_domain_model_kita.telephones',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_daycarecenters_domain_model_telephone',
                'foreign_field' => 'kita',
                'maxitems' => 9999,
                'appearance' => [
                    'collapseAll' => 0,
                    'levelLinksPosition' => 'both',
                    'showSynchronizationLink' => 1,
                    'showPossibleLocalizationRecords' => 1,
                    'showAllLocalizationLink' => 1
                ]
            ]
        ],
        'amount_of_groups' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:daycarecenters/Resources/Private/Language/locallang_db.xlf:tx_daycarecenters_domain_model_kita.amount_of_groups',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ]
        ],
        'space_offered' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:daycarecenters/Resources/Private/Language/locallang_db.xlf:tx_daycarecenters_domain_model_kita.space_offered',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ]
        ],
        'food_supply' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:daycarecenters/Resources/Private/Language/locallang_db.xlf:tx_daycarecenters_domain_model_kita.food_supply',
            'config' => [
                'type' => 'check',
                'default' => 0
            ]
        ],
        'food_info' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:daycarecenters/Resources/Private/Language/locallang_db.xlf:tx_daycarecenters_domain_model_kita.food_info',
            'config' => [
                'type' => 'text',
                'cols' => 30,
                'rows' => 8,
                'eval' => 'trim'
            ]
        ],
        'food_prices' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:daycarecenters/Resources/Private/Language/locallang_db.xlf:tx_daycarecenters_domain_model_kita.food_prices',
            'config' => [
                'type' => 'text',
                'cols' => 30,
                'rows' => 8,
                'eval' => 'trim'
            ]
        ],
        'closing_days' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:daycarecenters/Resources/Private/Language/locallang_db.xlf:tx_daycarecenters_domain_model_kita.closing_days',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ]
        ],
        'logo' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:daycarecenters/Resources/Private/Language/locallang_db.xlf:tx_daycarecenters_domain_model_kita.logo',
            'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
                'logo',
                [
                    'minitems' => 0,
                    'maxitems' => 1
                ]
            )
        ],
        'images' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:daycarecenters/Resources/Private/Language/locallang_db.xlf:tx_daycarecenters_domain_model_kita.images',
            'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
                'images',
                [
                    'minitems' => 0,
                    'maxitems' => 5
                ]
            )
        ],
        'response_times' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:daycarecenters/Resources/Private/Language/locallang_db.xlf:tx_daycarecenters_domain_model_kita.response_times',
            'config' => [
                'type' => 'text',
                'cols' => 30,
                'rows' => 8,
                'eval' => 'trim'
            ]
        ],
        'facebook' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:daycarecenters/Resources/Private/Language/locallang_db.xlf:tx_daycarecenters_domain_model_kita.facebook',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ]
        ],
        'twitter' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:daycarecenters/Resources/Private/Language/locallang_db.xlf:tx_daycarecenters_domain_model_kita.twitter',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ]
        ],
        'google' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:daycarecenters/Resources/Private/Language/locallang_db.xlf:tx_daycarecenters_domain_model_kita.google',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ]
        ],
        'additional_informations' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:daycarecenters/Resources/Private/Language/locallang_db.xlf:tx_daycarecenters_domain_model_kita.additional_informations',
            'config' => [
                'type' => 'text',
                'cols' => 40,
                'rows' => 15,
                'eval' => 'trim',
                'wizards' => [
                    'RTE' => [
                        'icon' => 'wizard_rte2.gif',
                        'notNewRecords' => 1,
                        'RTEonly' => 1,
                        'script' => 'wizard_rte.php',
                        'title' => 'LLL:EXT:cms/locallang_ttc.xlf:bodytext.W.RTE',
                        'type' => 'script',
                        'module' => [
                            'name' => 'wizard_rte'
                        ]
                    ]
                ]
            ],
            'defaultExtras' => 'richtext:rte_transform[flag=rte_enabled|mode=ts]'
        ],
        'earliest_opening_time' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:daycarecenters/Resources/Private/Language/locallang_db.xlf:tx_daycarecenters_domain_model_kita.earliest_opening_time',
            'config' => [
                'type' => 'input',
                'size' => 4,
                'eval' => 'time',
                'checkbox' => 1,
                'default' => 25200
            ]
        ],
        'latest_opening_time' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:daycarecenters/Resources/Private/Language/locallang_db.xlf:tx_daycarecenters_domain_model_kita.latest_opening_time',
            'config' => [
                'type' => 'input',
                'size' => 4,
                'eval' => 'time',
                'checkbox' => 1,
                'default' => 25200
            ]
        ],
        'earliest_age' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:daycarecenters/Resources/Private/Language/locallang_db.xlf:tx_daycarecenters_domain_model_kita.earliest_age',
            'config' => [
                'type' => 'input',
                'size' => 4
            ]
        ],
        'latest_age' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:daycarecenters/Resources/Private/Language/locallang_db.xlf:tx_daycarecenters_domain_model_kita.latest_age',
            'config' => [
                'type' => 'input',
                'size' => 4
            ]
        ],
        'holder' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:daycarecenters/Resources/Private/Language/locallang_db.xlf:tx_daycarecenters_domain_model_kita.holder',
            'config' => [
                'type' => 'select',
                'foreign_table' => 'tx_daycarecenters_domain_model_holder',
                'minitems' => 0,
                'maxitems' => 1
            ]
        ],
        'care_form' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:daycarecenters/Resources/Private/Language/locallang_db.xlf:tx_daycarecenters_domain_model_kita.care_form',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_daycarecenters_domain_model_careform',
                'foreign_field' => 'kita',
                'minitems' => 0,
                'maxitems' => 100
            ]
        ],
        'district' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:daycarecenters/Resources/Private/Language/locallang_db.xlf:tx_daycarecenters_domain_model_kita.district',
            'config' => [
                'type' => 'select',
                'foreign_table' => 'tx_daycarecenters_domain_model_district',
                'foreign_table_where' => 'ORDER BY tx_daycarecenters_domain_model_district.district',
                'items' => [
                    ['', '']
                ],
                'minitems' => 0,
                'maxitems' => 1
            ]
        ],
        'tx_maps2_uid' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:maps2/Resources/Private/Language/locallang_db.xlf:tx_maps2_uid',
            'config' => [
                'type' => 'group',
                'internal_type' => 'db',
                'allowed' => 'tx_maps2_domain_model_poicollection',
                'prepend_tname' => false,
                'show_thumbs' => false,
                'size' => 1,
                'maxitems' => 1,
                'wizards' => [
                    'suggest' => [
                        'type' => 'suggest',
                        'default' => [
                            'searchWholePhrase' => true
                        ],
                        'module' => [
                            'name' => 'wizard_suggest'
                        ]
                    ]
                ]
            ]
        ]
    ],
    'interface' => [
        'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, title, leader, street, house_number, zip, city, email, website, telephones, amount_of_groups, space_offered, food_supply, food_info, food_prices, closing_days, logo, images, response_times, facebook, twitter, google, additional_informations, earliest_opening_time, latest_opening_time, earliest_age, latest_age, holder, care_form, district, tx_maps2_uid'
    ],
    'types' => [
        '1' => ['showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, title, leader, street, house_number, zip, city, email, website, telephones, amount_of_groups, space_offered, food_supply, food_info, food_prices, closing_days, logo, images, response_times, facebook, twitter, google, additional_informations, earliest_opening_time, latest_opening_time, earliest_age, latest_age, holder, care_form, district, tx_maps2_uid,--div--;' . $ttContentLanguageFile . ':tabs.access,starttime, endtime']
    ],
    'palettes' => [
        '1' => ['showitem' => '']
    ]
];
