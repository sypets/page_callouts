<?php


defined('TYPO3_MODE') or die();

// encapsulate all locally defined variables
(function () {
    $GLOBALS['TYPO3_CONF_VARS']['SYS']['Objects'][\TYPO3\CMS\Backend\Controller\PageLayoutController::class] = [
        'className' => \Sypets\PageCallouts\Xclass\PageLayoutControllerWithCallouts::class
    ];
})();
