<?php
defined('TYPO3_MODE') or die();

$tx_cartography_feature = array(
    'ctrl' => array(
        'title' => 'LLL:EXT:cartography/Resources/Private/Language/locallang_db.xlf:cartography.feature.title',
        'label' => 'title',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'versioningWS' => 2,
        'origUid' => 't3_origuid',
        'delete' => 'deleted',
        'editlock' => 'editlock',
        'type' => 'feature_type',
        'useColumnsForDefaultValues' => 'doktype,maps',
        'enablecolumns' => array(
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
            'fe_group' => 'fe_group'
        ),
        'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('cartography') . 'Resources/Public/Images/Feature.png',
    ),
    'columns' => array(
        'feature_type' => array(
            'exclude' => 0,
            'label' => 'LLL:EXT:cartography/Resources/Private/Language/locallang_db.xlf:cartography.feature.type',
            'config' => array(
                'type' => 'select',
                'items' => array(
                    array('Point', 0),
                    array('Line', 1),
                    array('Polygon', 2),
                )
            )
        ),
        'title' => array(
            'label' => 'LLL:EXT:cartography/Resources/Private/Language/locallang_db.xlf:cartography.feature.featuretitle',
            'config' => array(
                'type' => 'input',
                'size' => '50',
                'max' => '255',
                'eval' => 'trim'
            )
        ),
        'coordinates' => array(
            'label' => 'LLL:EXT:cartography/Resources/Private/Language/locallang_db.xlf:cartography.feature.coordinates',
            'config' => array(
                'type' => 'inline',
                'foreign_table' => 'tx_cartography_coordinates',
                'foreign_field' => 'feature',
                'foreign_sortby' => 'sorting',
                'minitems' => 3,
                'maxitems' => 9999,
                'appearance' => array(
                    'useSortable' => TRUE,
                    'showSynchronizationLink' => TRUE,
                    'showAllLocalizationLink' => TRUE,
                    'showPossibleLocalizationRecords' => TRUE,
                    'showRemovedLocalizationRecords' => FALSE,
                    'expandSingle' => TRUE,
                    'enabledControls' => array(
                        'localize' => TRUE,
                    ),
                ),
                'behaviour' => array(
                    'localizationMode' => 'select',
                    'mode' => 'select',
                    'localizeChildrenAtParentLocalization' => TRUE,
                ),
            ),
        ),
        'maps' => array(
            'label' => 'LLL:EXT:cartography/Resources/Private/Language/locallang_db.xlf:cartography.feature.maps',
            'config' => array(
                'type' => 'select',
                'allowed' => 'tx_cartography_map',
                'foreign_table' => 'tx_cartography_map',
                'MM' => 'tx_cartography_map_feature_mm',
                'size' => 10,
                'minitems' => 0,
                'maxitems' => 9999
            )
        ),
        'info' => array(
            'label' => 'LLL:EXT:cartography/Resources/Private/Language/locallang_db.xlf:cartography.feature.info',
            'config' => array(
                'type' => 'text',
                'cols' => '40',
                'rows' => '15'
            )
        ),
        'editlock' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:lang/locallang_tca.xlf:editlock',
            'config' => array(
                'type' => 'check',
                'items' => array(
                    '1' => array(
                        '0' => 'LLL:EXT:lang/locallang_core.xlf:labels.enabled'
                    )
                )
            )
        ),
        'hidden' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:cartography/Resources/Private/Language/locallang_db.xlf:cartography.feature.hide',
            'config' => array(
                'type' => 'check',
                'default' => '1',
                'items' => array(
                    '1' => array(
                        '0' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.hidden_checkbox_1_formlabel'
                    )
                )
            )
        ),
        'starttime' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.starttime',
            'config' => array(
                'type' => 'input',
                'size' => '13',
                'eval' => 'datetime',
                'default' => '0'
            )
        ),
        'endtime' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.endtime',
            'config' => array(
                'type' => 'input',
                'size' => '13',
                'eval' => 'datetime',
                'default' => '0',
                'range' => array(
                    'upper' => mktime(0, 0, 0, 1, 1, 2038)
                )
            )
        ),
        'fe_group' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.fe_group',
            'config' => array(
                'type' => 'select',
                'size' => 7,
                'maxitems' => 20,
                'items' => array(
                    array(
                        'LLL:EXT:lang/locallang_general.xlf:LGL.hide_at_login',
                        -1
                    ),
                    array(
                        'LLL:EXT:lang/locallang_general.xlf:LGL.any_login',
                        -2
                    ),
                    array(
                        'LLL:EXT:lang/locallang_general.xlf:LGL.usergroups',
                        '--div--'
                    )
                ),
                'exclusiveKeys' => '-1,-2',
                'foreign_table' => 'fe_groups',
                'foreign_table_where' => 'ORDER BY fe_groups.title'
            )
        )
    ),
    'types' => array(
        '0' => array(
            'showitem' => '--div--;LLL:EXT:cartography/Resources/Private/Language/locallang_db.xlf:cartography.tabs.general, feature_type, title, coordinates, maps, info, --div--;LLL:EXT:cartography/Resources/Private/Language/locallang_db.xlf:cartography.tabs.access, hidden, starttime, endtime, editlock, fe_group',
            'columnsOverrides' => array(
                'coordinates' => array(
                    'config' => array(
                        'minitems' => 1,
                        'maxitems' => 1
                    ),
                ),
            ),
        ),
        '1' => array(
            'showitem' => '--div--;LLL:EXT:cartography/Resources/Private/Language/locallang_db.xlf:cartography.tabs.general, feature_type, title, coordinates, maps, info, --div--;LLL:EXT:cartography/Resources/Private/Language/locallang_db.xlf:cartography.tabs.access, hidden, starttime, endtime, editlock, fe_group',
            'columnsOverrides' => array(
                'coordinates' => array(
                    'config' => array(
                        'minitems' => 2,
                        'maxitems' => 2
                    ),
                ),
            ),
        ),
        '2' => array('showitem' => '--div--;LLL:EXT:cartography/Resources/Private/Language/locallang_db.xlf:cartography.tabs.general, feature_type, title, coordinates, maps, info, --div--;LLL:EXT:cartography/Resources/Private/Language/locallang_db.xlf:cartography.tabs.access, hidden, starttime, endtime, editlock, fe_group')
    ),
);

return $tx_cartography_feature;