<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:daycarecenters/Resources/Private/Language/locallang_db.xlf:tx_daycarecenters_domain_model_kita',
        'label' => 'title',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'dividers2tabs' => true,
        'default_sortby' => 'ORDER BY title',
        'versioningWS' => true,
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
        'searchFields' => 'title,leader,places,street,zip,city,email,website,food_info,closing_days,response_times',
        'typeicon_classes' => [
            'default' => 'ext-daycarecenters-kita'
        ]    ],
    'interface' => [
        'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, title, path_segment, leader, places, street, house_number, zip, city, email, website, telephones, amount_of_groups, space_offered, food_supply, food_info, food_prices, closing_days, logo, images, response_times, facebook, twitter, instagram, additional_informations, earliest_opening_time, latest_opening_time, earliest_age, latest_age, holder, care_form, district'
    ],
    'types' => [
        '1' => [
            'showitem' => '--palette--;;languageHidden, title, path_segment, leader, places,
            --palette--;;streetHouseNumber, --palette--;;zipCity, --palette--;;emailWebsite, telephones, amount_of_groups, space_offered, food_supply,
            food_info, food_prices, closing_days, logo, images, response_times, facebook, twitter, instagram,
            additional_informations, --palette--;;openingTimes, --palette--;;ages,
            holder, care_form, district,
            --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.tabs.access, 
            --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.palettes.access;access'
        ]
    ],
    'palettes' => [
        'languageHidden' => ['showitem' => 'sys_language_uid, l10n_parent, hidden'],
        'streetHouseNumber' => ['showitem' => 'street, house_number'],
        'zipCity' => ['showitem' => 'zip, city'],
        'emailWebsite' => ['showitem' => 'email, website'],
        'openingTimes' => ['showitem' => 'earliest_opening_time, latest_opening_time'],
        'ages' => ['showitem' => 'earliest_age, latest_age'],
        'access' => [
            'showitem' => 'starttime;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:starttime_formlabel,endtime;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:endtime_formlabel',
        ]
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
                    ],
                ],
                'default' => 0,
            ]
        ],
        'l10n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.l18n_parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['', 0],
                ],
                'foreign_table' => 'tx_daycarecenters_domain_model_kita',
                'foreign_table_where' => 'AND tx_daycarecenters_domain_model_kita.pid=###CURRENT_PID### AND tx_daycarecenters_domain_model_kita.sys_language_uid IN (-1,0)',
                'fieldWizard' => [
                    'selectIcons' => [
                        'disabled' => true,
                    ],
                ],
                'default' => 0,
            ]
        ],
        'l10n_diffsource' => [
            'config' => [
                'type' => 'passthrough',
                'default' => ''
            ]
        ],
        'hidden' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.hidden',
            'config' => [
                'type' => 'check',
                'default' => 0
            ]
        ],
        'cruser_id' => [
            'label' => 'cruser_id',
            'config' => [
                'type' => 'passthrough'
            ]
        ],
        'pid' => [
            'label' => 'pid',
            'config' => [
                'type' => 'passthrough'
            ]
        ],
        'crdate' => [
            'label' => 'crdate',
            'config' => [
                'type' => 'passthrough',
            ]
        ],
        'tstamp' => [
            'label' => 'tstamp',
            'config' => [
                'type' => 'passthrough',
            ]
        ],
        'starttime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:starttime_formlabel',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'size' => 16,
                'eval' => 'datetime,int',
                'default' => 0,
                'behaviour' => [
                    'allowLanguageSynchronization' => true,
                ],
            ]
        ],
        'endtime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:endtime_formlabel',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'size' => 16,
                'eval' => 'datetime,int',
                'default' => 0,
                'behaviour' => [
                    'allowLanguageSynchronization' => true,
                ],
            ]
        ],
        'title' => [
            'exclude' => true,
            'label' => 'LLL:EXT:daycarecenters/Resources/Private/Language/locallang_db.xlf:tx_daycarecenters_domain_model_kita.title',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ]
        ],
        'path_segment' => [
            'label' => 'LLL:EXT:daycarecenters/Resources/Private/Language/locallang_db.xlf:tx_daycarecenters_domain_model_kita.path_segment',
            'displayCond' => 'VERSION:IS:false',
            'config' => [
                'type' => 'slug',
                'size' => 50,
                'generatorOptions' => [
                    'fields' => ['title'],
                    // Do not add pageSlug, as we add pageSlug on our own in RouteEnhancer
                    'prefixParentPageSlug' => false,
                    'fieldSeparator' => '-',
                    'replacements' => [
                        '/' => '-'
                    ],
                ],
                'fallbackCharacter' => '-',
                'eval' => 'uniqueInSite',
                'default' => ''
            ]
        ],
        'leader' => [
            'exclude' => true,
            'label' => 'LLL:EXT:daycarecenters/Resources/Private/Language/locallang_db.xlf:tx_daycarecenters_domain_model_kita.leader',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ]
        ],
        'places' => [
            'exclude' => true,
            'label' => 'LLL:EXT:daycarecenters/Resources/Private/Language/locallang_db.xlf:tx_daycarecenters_domain_model_kita.places',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'street' => [
            'exclude' => true,
            'label' => 'LLL:EXT:daycarecenters/Resources/Private/Language/locallang_db.xlf:tx_daycarecenters_domain_model_kita.street',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ]
        ],
        'house_number' => [
            'exclude' => true,
            'label' => 'LLL:EXT:daycarecenters/Resources/Private/Language/locallang_db.xlf:tx_daycarecenters_domain_model_kita.house_number',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ]
        ],
        'zip' => [
            'exclude' => true,
            'label' => 'LLL:EXT:daycarecenters/Resources/Private/Language/locallang_db.xlf:tx_daycarecenters_domain_model_kita.zip',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ]
        ],
        'city' => [
            'exclude' => true,
            'label' => 'LLL:EXT:daycarecenters/Resources/Private/Language/locallang_db.xlf:tx_daycarecenters_domain_model_kita.city',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ]
        ],
        'email' => [
            'exclude' => true,
            'label' => 'LLL:EXT:daycarecenters/Resources/Private/Language/locallang_db.xlf:tx_daycarecenters_domain_model_kita.email',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ]
        ],
        'website' => [
            'exclude' => true,
            'label' => 'LLL:EXT:daycarecenters/Resources/Private/Language/locallang_db.xlf:tx_daycarecenters_domain_model_kita.website',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputLink',
                'size' => 30,
                'eval' => 'trim',
            ]
        ],
        'telephones' => [
            'exclude' => true,
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
            'exclude' => true,
            'label' => 'LLL:EXT:daycarecenters/Resources/Private/Language/locallang_db.xlf:tx_daycarecenters_domain_model_kita.amount_of_groups',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ]
        ],
        'space_offered' => [
            'exclude' => true,
            'label' => 'LLL:EXT:daycarecenters/Resources/Private/Language/locallang_db.xlf:tx_daycarecenters_domain_model_kita.space_offered',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ]
        ],
        'food_supply' => [
            'exclude' => true,
            'label' => 'LLL:EXT:daycarecenters/Resources/Private/Language/locallang_db.xlf:tx_daycarecenters_domain_model_kita.food_supply',
            'config' => [
                'type' => 'check',
                'default' => 0
            ]
        ],
        'food_info' => [
            'exclude' => true,
            'label' => 'LLL:EXT:daycarecenters/Resources/Private/Language/locallang_db.xlf:tx_daycarecenters_domain_model_kita.food_info',
            'config' => [
                'type' => 'text',
                'cols' => 30,
                'rows' => 8,
                'eval' => 'trim'
            ]
        ],
        'food_prices' => [
            'exclude' => true,
            'label' => 'LLL:EXT:daycarecenters/Resources/Private/Language/locallang_db.xlf:tx_daycarecenters_domain_model_kita.food_prices',
            'config' => [
                'type' => 'text',
                'cols' => 30,
                'rows' => 8,
                'eval' => 'trim'
            ]
        ],
        'closing_days' => [
            'exclude' => true,
            'label' => 'LLL:EXT:daycarecenters/Resources/Private/Language/locallang_db.xlf:tx_daycarecenters_domain_model_kita.closing_days',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ]
        ],
        'logo' => [
            'exclude' => true,
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
            'exclude' => true,
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
            'exclude' => true,
            'label' => 'LLL:EXT:daycarecenters/Resources/Private/Language/locallang_db.xlf:tx_daycarecenters_domain_model_kita.response_times',
            'config' => [
                'type' => 'text',
                'cols' => 30,
                'rows' => 8,
                'eval' => 'trim'
            ]
        ],
        'facebook' => [
            'exclude' => true,
            'label' => 'LLL:EXT:daycarecenters/Resources/Private/Language/locallang_db.xlf:tx_daycarecenters_domain_model_kita.facebook',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputLink',
                'size' => 30,
                'eval' => 'trim'
            ]
        ],
        'twitter' => [
            'exclude' => true,
            'label' => 'LLL:EXT:daycarecenters/Resources/Private/Language/locallang_db.xlf:tx_daycarecenters_domain_model_kita.twitter',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputLink',
                'size' => 30,
                'eval' => 'trim'
            ]
        ],
        'instagram' => [
            'exclude' => true,
            'label' => 'LLL:EXT:daycarecenters/Resources/Private/Language/locallang_db.xlf:tx_daycarecenters_domain_model_kita.instagram',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputLink',
                'size' => 30,
                'eval' => 'trim'
            ]
        ],
        'additional_informations' => [
            'exclude' => true,
            'label' => 'LLL:EXT:daycarecenters/Resources/Private/Language/locallang_db.xlf:tx_daycarecenters_domain_model_kita.additional_informations',
            'config' => [
                'type' => 'text',
                'cols' => 40,
                'rows' => 15,
                'softref' => 'rtehtmlarea_images,typolink_tag,images,email[subst],url',
                'enableRichtext' => true,
                'richtextConfiguration' => 'default',
            ],
        ],
        'earliest_opening_time' => [
            'exclude' => true,
            'label' => 'LLL:EXT:daycarecenters/Resources/Private/Language/locallang_db.xlf:tx_daycarecenters_domain_model_kita.earliest_opening_time',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'size' => 4,
                'eval' => 'time',
                'checkbox' => 1,
                'default' => 25200
            ]
        ],
        'latest_opening_time' => [
            'exclude' => true,
            'label' => 'LLL:EXT:daycarecenters/Resources/Private/Language/locallang_db.xlf:tx_daycarecenters_domain_model_kita.latest_opening_time',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'size' => 4,
                'eval' => 'time',
                'checkbox' => 1,
                'default' => 25200
            ]
        ],
        'earliest_age' => [
            'exclude' => true,
            'label' => 'LLL:EXT:daycarecenters/Resources/Private/Language/locallang_db.xlf:tx_daycarecenters_domain_model_kita.earliest_age',
            'config' => [
                'type' => 'input',
                'size' => 4,
                'eval' => 'int'
            ]
        ],
        'latest_age' => [
            'exclude' => true,
            'label' => 'LLL:EXT:daycarecenters/Resources/Private/Language/locallang_db.xlf:tx_daycarecenters_domain_model_kita.latest_age',
            'config' => [
                'type' => 'input',
                'size' => 4,
                'eval' => 'int'
            ]
        ],
        'holder' => [
            'exclude' => true,
            'label' => 'LLL:EXT:daycarecenters/Resources/Private/Language/locallang_db.xlf:tx_daycarecenters_domain_model_kita.holder',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'foreign_table' => 'tx_daycarecenters_domain_model_holder',
                'minitems' => 0,
                'maxitems' => 1
            ]
        ],
        'care_form' => [
            'exclude' => true,
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
            'exclude' => true,
            'label' => 'LLL:EXT:daycarecenters/Resources/Private/Language/locallang_db.xlf:tx_daycarecenters_domain_model_kita.district',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'foreign_table' => 'tx_daycarecenters_domain_model_district',
                'foreign_table_where' => 'ORDER BY tx_daycarecenters_domain_model_district.district',
                'items' => [
                    ['', '']
                ],
                'minitems' => 0,
                'maxitems' => 1,
                'eval' => 'required'
            ]
        ]
    ]
];
