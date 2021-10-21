<?php
defined('TYPO3') || die();

call_user_func(function ($extensionKey) {
    // Deprecated since 10.0 @see https://docs.typo3.org/c/typo3/cms-core/master/en-us/Changelog/10.0/Breaking-87623-ReplaceConfigpersistenceclassesTyposcriptConfiguration.html
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTypoScriptSetup(
        '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:' . $extensionKey . '/Configuration/TypoScript/Extbase/setup.txt">'
    );

    $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['ext/install']['update']['staticInfoTablesDe_importStaticData']
        = \Jambagecom\StaticInfoTablesDe\Updates\ImportStaticDataUpdateWizard::class;

}, 'static_info_tables_de');

