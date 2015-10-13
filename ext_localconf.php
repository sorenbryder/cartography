<?php
defined('TYPO3_MODE') or die();

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'AM.'.$_EXTKEY,
    'Cartography',
    array(
        'Map' => 'show',
        'Geometry' => 'geoJSON'
    )
);

if (!is_array($TYPO3_CONF_VARS['SYS']['caching']['cacheConfigurations']['cartography_cache'])) {
    $TYPO3_CONF_VARS['SYS']['caching']['cacheConfigurations']['cartography_cache'] = array(
        'groups' => array('pages')
    );
}