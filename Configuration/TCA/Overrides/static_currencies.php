<?php

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

defined('TYPO3') || die();

call_user_func(function ($extensionKey, $table) {
    $additionalFields = array(
        'cu_name_en' => 'cu_name_de',
        'cu_sub_name_en' => 'cu_sub_name_de'
    );
    foreach ($additionalFields as $sourceField => $destField) {
        $additionalColumns = array();
        $additionalColumns[$destField] = $GLOBALS['TCA'][$table]['columns'][$sourceField];
        $additionalColumns[$destField]['label'] = 'LLL:EXT:' . $extensionKey . '/Resources/Private/Language/locallang_db.xlf:static_currencies_item.' . $destField;
        ExtensionManagementUtility::addTCAcolumns($table, $additionalColumns);
        ExtensionManagementUtility::addToAllTCAtypes($table, $destField, '', 'after:' . $sourceField);
        // Add as search field
        $GLOBALS['TCA'][$table]['ctrl']['searchFields'] .= ',' . $destField;
    }
}, 'static_info_tables_de', basename(__FILE__, '.php'));
