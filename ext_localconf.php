<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'Ps.Fortyone',
            'Frontend',
            [
                'Example' => 'list, show, new, create, edit, update, delete'
            ],
            // non-cacheable actions
            [
                'Example' => 'create, update, delete'
            ]
        );

    // wizards
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        'mod {
            wizards.newContentElement.wizardItems.plugins {
                elements {
                    frontend {
                        iconIdentifier = fortyone-plugin-frontend
                        title = LLL:EXT:fortyone/Resources/Private/Language/locallang_db.xlf:tx_fortyone_frontend.name
                        description = LLL:EXT:fortyone/Resources/Private/Language/locallang_db.xlf:tx_fortyone_frontend.description
                        tt_content_defValues {
                            CType = list
                            list_type = fortyone_frontend
                        }
                    }
                }
                show = *
            }
       }'
    );
		$iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
		
			$iconRegistry->registerIcon(
				'fortyone-plugin-frontend',
				\TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
				['source' => 'EXT:fortyone/Resources/Public/Icons/user_plugin_frontend.svg']
			);
		
    }
);
