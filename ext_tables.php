<?php
defined('TYPO3_MODE') || die();

call_user_func(static function() {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_activityindicator_domain_model_activityindicator', 'EXT:activityindicator/Resources/Private/Language/locallang_csh_tx_activityindicator_domain_model_activityindicator.xlf');
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_activityindicator_domain_model_activityindicator');
});
