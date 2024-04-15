<?php

namespace Sypets\PageCallouts\EventListener;

use TYPO3\CMS\Backend\Controller\Event\ModifyPageLayoutContentEvent;
use TYPO3\CMS\Backend\Template\Components\ButtonBar;
use TYPO3\CMS\Core\Configuration\ExtensionConfiguration;
use TYPO3\CMS\Core\Imaging\Icon;
use TYPO3\CMS\Core\Imaging\IconFactory;
use TYPO3\CMS\Core\Localization\LanguageService;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class PageLayoutListener
{
    protected IconFactory $iconFactory;
    protected array $extConf;

    public function __construct(IconFactory $iconFactory, ExtensionConfiguration $extensionConfiguration)
    {
        $this->iconFactory = $iconFactory;
        $this->extConf = $extensionConfiguration->get('page_callouts');
    }

    public function __invoke(ModifyPageLayoutContentEvent $event): void
    {
        // check if enabled in Extension Configuration
        if (!$this->getExtensionConfigurationTypeBool('enableCloseButtonInPageModule', true)) {
            return;
        }

        $returnUrl = $event->getRequest()->getQueryParams()['returnUrl'] ?? '';

        if ($returnUrl) {
            $view = $event->getModuleTemplate();
            $buttonBar = $view->getDocHeaderComponent()->getButtonBar();

            $returnButton = $buttonBar->makeLinkButton()
                //->setHref($refererUrl)
                ->setHref($returnUrl)
                ->setTitle($this->getLanguageService()->sL('LLL:EXT:core/Resources/Private/Language/locallang_core.xlf:labels.close') ?: 'Close')
                ->setIcon($this->iconFactory->getIcon('actions-close', Icon::SIZE_SMALL))
                ->setShowLabelText(true);
            $buttonBar->addButton($returnButton, ButtonBar::BUTTON_POSITION_LEFT, 0);
        }
    }

    protected function getExtensionConfigurationTypeBool(string $setting, bool $defaultValue): bool
    {
        if (isset($extConf[$setting])) {
            return (bool)$extConf[$setting];
        }
        return $defaultValue;
    }

    protected function getLanguageService(): LanguageService
    {
        return $GLOBALS['LANG'];
    }
}
