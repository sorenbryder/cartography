<?php
defined('TYPO3_MODE') or die();

$tx_cartography_coordinate = array(
    'ctrl' => array(
        'title' => 'Coordinate',
        'label' => 'latitude',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'versioningWS' => 2,
        'origUid' => 't3_origuid',
        'delete' => 'deleted',
        'editlock' => 'editlock',
        //'useColumnsForDefaultValues' => 'doktype,fe_group,hidden',
    ),
    'columns' => array(
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
        'feature' => array(
            'label' => 'Feature',
            'config' => array(
                'type' => 'select',
                'allowed' => 'tx_cartography_feature',
                'foreign_table' => 'tx_cartography_feature',
                'MM' => 'tx_cartography_feature_coordinate_mm',
                'size' => 10,
                'minitems' => 0,
                'maxitems' => 9999
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
    ),
    'types' => array(
        '0' => array('showitem' => '--div--;LLL:EXT:cartography/Resources/Private/Language/locallang_db.xlf:cartography_map.tabs.general, latitude, longitude, altitude, feature, --div--;LLL:EXT:cartography/Resources/Private/Language/locallang_db.xlf:cartographys_map.tabs.access, editlock')
    )
);

return $tx_cartography_coordinate;