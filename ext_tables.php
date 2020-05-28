<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'Ps.Fortyone',
            'Frontend',
            'Frontend'
        );

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('fortyone', 'Configuration/TypoScript', '41m.in');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_fortyone_domain_model_example', 'EXT:fortyone/Resources/Private/Language/locallang_csh_tx_fortyone_domain_model_example.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_fortyone_domain_model_example');

    }
);
