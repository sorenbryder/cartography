<?php
defined('TYPO3_MODE') or die();

$tx_cartography_point = array(
    'ctrl' => array(
        'title' => 'Point',
        'label' => 'title',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'versioningWS' => 2,
        'origUid' => 't3_origuid',
        'delete' => 'deleted',
        'editlock' => 'editlock',
        //'useColumnsForDefaultValues' => 'doktype,fe_group,hidden',
        'enablecolumns' => array(
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
            'fe_group' => 'fe_group'
        )
    ),
    'columns' => array(
        'title' => array(
            'label' => 'Title (not visible in frontend)',
            'config' => array(
                'type' => 'input',
                'size' => '50',
                'max' => '255',
                'eval' => 'trim'
            )
        ),
        'latitude' => array(
            'label' => 'Latitude',
            'config' => array(
                'type' => 'input',
                'size' => '20',
                'max' => '12',
                'eval' => 'trim,required'
            )
        ),
        'longitude' => array(
            'label' => 'Longitude',
            'config' => array(
                'type' => 'input',
                'size' => '20',
                'max' => '12',
                'eval' => 'trim,required'
            )
        ),
        'altitude' => array(
            'label' => 'Altitude',
            'config' => array(
                'type' => 'input',
                'size' => '20',
                'max' => '12',
                'eval' => 'trim,required'
            )
        ),
        'maps' => array(
            'label' => 'Maps',
            'config' => array(
                'type' => 'select',
                'allowed' => 'tx_cartography_map',
                'foreign_table' => 'tx_cartography_map',
                'MM' => 'tx_cartography_map_point_mm',
                'size' => 10,
                'minitems' => 0,
                'maxitems' => 9999
            )
        ),
        'infowindow_item' => array(
            'label' => 'Infowindow',
            'config' => array(
                'type' => 'inline',
                'foreign_table' => 'tt_content',
                'foreign_field' => 'tx_cartography_point',
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
            'label' => 'Hide map',
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
        '0' => array('showitem' => '--div--;LLL:EXT:cartography/Resources/Private/Language/locallang_db.xlf:cartography_map.tabs.general, title, latitude, longitude, altitude, maps, infowindow_item, --div--;LLL:EXT:cartography/Resources/Private/Language/locallang_db.xlf:cartographys_map.tabs.access, hidden, starttime, endtime, editlock, fe_group')
    )
);

return $tx_cartography_point;