<?php

declare(strict_types=1);

namespace Sypets\PageCallouts\Xclass;

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
use Psr\Http\Message\ServerRequestInterface;
use TYPO3\CMS\Backend\Controller\PageLayoutController;
use TYPO3\CMS\Backend\Template\Components\ButtonBar;
use TYPO3\CMS\Backend\Template\ModuleTemplate;
use TYPO3\CMS\Core\Configuration\ExtensionConfiguration;
use TYPO3\CMS\Core\Imaging\Icon;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class PageLayoutControllerWithCallouts extends PageLayoutController
{
    /**
     * Add flash message in page module via hook.
     *
     * We are using $this->pageinfo (read-only) from parent class. Property is internal
     * so this is a bit ugly - but no better alternative, at the moment.
     *
     * @param ServerRequestInterface $request
     * @return string
     */
    protected function generateMessagesForCurrentPage(ServerRequestInterface $request): array
    {
        $content = parent::generateMessagesForCurrentPage($request);
        // added for compatibility with older versions, should use only $this->pageinfo['sys_language_uid'] in future
        $this->pageinfo['lang'] = $this->pageinfo['sys_language_uid'];
        // Add messages via hooks
        foreach (
            $GLOBALS
                ['TYPO3_CONF_VARS']
                ['SC_OPTIONS']
                ['Sypets/PageCallouts/Xclass/PageLayoutControllerWithCallouts']
                ['addFlashMessageToPageModule'] ?? []
             as $className
        ) {
            $hook = GeneralUtility::makeInstance($className);
            $result = $hook->addMessages($this->pageinfo);
            if (is_array($result) && !empty($result)) {
                $content[] = $result;
            }
        }
        return $content;
    }
    /*
        protected function makeButtons(ModuleTemplate $view, ServerRequestInterface $request, array $tsConfig): void
        {
            parent::makeButtons($request);

            $returnUrl = $request->getQueryParams()['returnUrl'] ?? '';
            if (!$returnUrl) {
                return;
            }

            // check if enabled in Extension Configuration
            if (!$this->getExtensionConfigurationTypeBool('enableCloseButtonInPageModule', true)) {
                return;
            }

            $returnButton = $this->buttonBar->makeLinkButton()
                ->setHref($returnUrl)
                ->setTitle($this->getLanguageService()->sL('LLL:EXT:core/Resources/Private/Language/locallang_core.xlf:labels.close') ?: 'Close')
                // Create your custom icon or use any of the alredy created icons
                ->setIcon($this->iconFactory->getIcon('actions-close', Icon::SIZE_SMALL))
                ->setShowLabelText(true);
            // should use BUTTON_POSITION_RIGHT, but does not work?
            $this->buttonBar->addButton($returnButton, ButtonBar::BUTTON_POSITION_LEFT, 0);
        }

        protected function getExtensionConfigurationTypeBool(string $setting, bool $defaultValue): bool
        {
            $extConf = GeneralUtility::makeInstance(ExtensionConfiguration::class)->get('page_callouts');
            if (isset($extConf[$setting])) {
                return (bool)$extConf[$setting];
            }
            return $defaultValue;
        }
    */
}
