<?php
defined('TYPO3_MODE') || die();

$pluginSignature = 'activityindicator_activityindicator';

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'Activityindicator',
    'Activityindicator',
    'ActivityIndicator'
);

$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
	$pluginSignature,
	'FILE:EXT:activityindicator/Configuration/FlexForms/ActivityIndicator_ActivityIndicator.xml'
);