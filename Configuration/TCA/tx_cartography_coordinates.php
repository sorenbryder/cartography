<?php
defined('TYPO3_MODE') or die();

$tx_cartography_coordinates = array(
    'ctrl' => array(
        'title' => 'LLL:EXT:cartography/Resources/Private/Language/locallang_db.xlf:cartography.coordinates.title',
        'label' => 'latitude',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'versioningWS' => 2,
        'origUid' => 't3_origuid',
        'delete' => 'deleted',
        'editlock' => 'editlock',
        'hideTable' => TRUE,
        'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('cartography') . 'Resources/Public/Images/Coordinates.png',
    ),
    'columns' => array(
        'latitude' => array(
            'label' => 'LLL:EXT:cartography/Resources/Private/Language/locallang_db.xlf:cartography.coordinates.latitude',
            'config' => array(
                'type' => 'input',
                'size' => '20',
                'max' => '12',
                'eval' => 'trim,required'
            )
        ),
        'longitude' => array(
            'label' => 'LLL:EXT:cartography/Resources/Private/Language/locallang_db.xlf:cartography.coordinates.longitude',
            'config' => array(
                'type' => 'input',
                'size' => '20',
                'max' => '12',
                'eval' => 'trim,required'
            )
        ),
        'altitude' => array(
            'label' => 'LLL:EXT:cartography/Resources/Private/Language/locallang_db.xlf:cartography.coordinates.altitude',
            'config' => array(
                'type' => 'input',
                'size' => '20',
                'max' => '12',
                'eval' => 'trim'
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

return $tx_cartography_coordinates;