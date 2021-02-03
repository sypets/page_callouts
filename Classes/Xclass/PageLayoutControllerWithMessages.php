<?php
declare(strict_types=1);
namespace Sypets\PageMessages\Xclass;

/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

use TYPO3\CMS\Backend\Controller\PageLayoutController;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Fluid\View\StandaloneView;
use TYPO3\CMS\Fluid\ViewHelpers\Be\InfoboxViewHelper;

class PageLayoutControllerWithMessages extends PageLayoutController
{
    /**
     * Add flash message in page module via hook.
     *
     * @return string
     */
    protected function getHeaderFlashMessagesForCurrentPid(): string
    {
        $content = parent::getHeaderFlashMessagesForCurrentPid();
        $pageInfo = [
            'uid' => $this->pageinfo['uid'],
            'title' => $this->pageinfo['title'],
            'lang' =>  $this->pageinfo['sys_language_uid'],
            't3_origuid' =>  $this->pageinfo['t3_origuid'],
            'hidden' =>  $this->pageinfo['hidden'],
            'doktype' =>  $this->pageinfo['doktype'],
        ];

        $messages = [];
        // Add messages via hooks
        foreach($GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['Sypets/PageMessages/Xclass/PageLayoutControllerWithMessages']['addFlashMessageToPageModule'] ?? [] as $className) {
            $hook = GeneralUtility::makeInstance($className);
            $result = $hook->addMessages($pageInfo);
            if ($result && is_array($result)) {
                $messages[] = $result;
            }
        }
        if ($messages) {
            $view = GeneralUtility::makeInstance(StandaloneView::class);
            $view->setTemplatePathAndFilename(GeneralUtility::getFileAbsFileName('EXT:page_messages/Resources/Private/Templates/InfoBox.html'));
            $view->assign('messages', $messages);
            $content .= $view->render();
        }

        return $content;
    }
}
