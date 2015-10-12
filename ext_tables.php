<?php
defined('TYPO3_MODE') or die();

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Cartography');

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    $_EXTKEY,
    'Cartography',
    'Map'
);

$TCA['tt_content']['types']['list']['subtypes_addlist']['cartography_cartography'] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
    'cartography_cartography',
    'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/Plugin.xml'
);

$TCA['tt_content']['types']['list']['subtypes_excludelist']['cartography_cartography'] = 'recursive, select_key, pages';