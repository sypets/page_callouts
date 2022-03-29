<?php

defined('TYPO3_MODE') or die();

// encapsulate all locally defined variables
(function () {
    $GLOBALS['TYPO3_CONF_VARS']['SYS']['Objects'][\TYPO3\CMS\Backend\Controller\PageLayoutController::class] = [
        'className' => \Sypets\PageCallouts\Xclass\PageLayoutControllerWithCallouts::class
    ];
})();

/**
 * Adding the default User TSconfig for showing the info box in the page module
 */
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addUserTSConfig('
        @import "EXT:page_callouts/Configuration/TSconfig/User/default.tsconfig"
   ');
