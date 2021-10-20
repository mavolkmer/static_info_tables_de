<?php

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

defined('TYPO3') || die();

call_user_func(function ($extensionKey, $table) {
    $additionalFields = array(
        'lg_name_en' => 'lg_name_de'
    );
    foreach ($additionalFields as $sourceField => $destField) {
        $additionalColumns = array();
        $additionalColumns[$destField] = $GLOBALS['TCA'][$table]['columns'][$sourceField];
        $additionalColumns[$destField]['label'] = 'LLL:EXT:' . $extensionKey . '/Resources/Private/Language/locallang_db.xlf:static_languages_item.' . $destField;
        ExtensionManagementUtility::addTCAcolumns($table, $additionalColumns);
        ExtensionManagementUtility::addToAllTCAtypes($table, $destField, '', 'after:' . $sourceField);
        // Add as search field
        $GLOBALS['TCA'][$table]['ctrl']['searchFields'] .= ',' . $destField;
    }
}, 'static_info_tables_de', basename(__FILE__, '.php'));
