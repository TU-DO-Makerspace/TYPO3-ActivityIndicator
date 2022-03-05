<?php
defined('TYPO3_MODE') || die();

(static function() {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'Activityindicator',
        'Activityindicator',
        [
            \TUDOMakerspace\Activityindicator\Controller\ActivityIndicatorController::class => 'display'
        ],
        // non-cacheable actions
        [
            \TUDOMakerspace\Activityindicator\Controller\ActivityIndicatorController::class => 'display'
        ]
    );

    // wizards
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        'mod {
            wizards.newContentElement.wizardItems.plugins {
                elements {
                    activityindicator {
                        iconIdentifier = activityindicator-plugin-activityindicator
                        title = LLL:EXT:activityindicator/Resources/Private/Language/locallang_db.xlf:tx_activityindicator_activityindicator.name
                        description = LLL:EXT:activityindicator/Resources/Private/Language/locallang_db.xlf:tx_activityindicator_activityindicator.description
                        tt_content_defValues {
                            CType = list
                            list_type = activityindicator_activityindicator
                        }
                    }
                }
                show = *
            }
       }'
    );

    $iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
    $iconRegistry->registerIcon(
        'activityindicator-plugin-activityindicator',
        \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
        ['source' => 'EXT:activityindicator/Resources/Public/Icons/user_plugin_activityindicator.svg']
    );
})();
