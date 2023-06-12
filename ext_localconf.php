<?php

use Sypets\PageCallouts\Xclass\PageLayoutControllerWithCallouts;
use TYPO3\CMS\Backend\Controller\PageLayoutController;

defined('TYPO3') or die();

$GLOBALS['TYPO3_CONF_VARS']['SYS']['Objects'][PageLayoutController::class] = [
    'className' => PageLayoutControllerWithCallouts::class
];
