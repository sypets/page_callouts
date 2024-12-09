<?php

namespace Sypets\PageCallouts\EventListener;

use TYPO3\CMS\Backend\Controller\Event\ModifyPageLayoutContentEvent;
use TYPO3\CMS\Backend\Template\Components\ButtonBar;
use TYPO3\CMS\Core\Configuration\ExtensionConfiguration;
use TYPO3\CMS\Core\Imaging\Icon;
use TYPO3\CMS\Core\Imaging\IconFactory;
use TYPO3\CMS\Core\Information\Typo3Version;
use TYPO3\CMS\Core\Localization\LanguageService;

/**
 * @todo can be removed when version for TYPO3 v12 and below is dropped because TYPO3 v13 provides this functionality:
 * @see https://docs.typo3.org/c/typo3/cms-core/main/en-us/Changelog/13.3/Feature-103789-AddCloseButtonToPageLayoutIfReturnUrlIsSet.html
 */
class PageLayoutListener
{
    protected IconFactory $iconFactory;
    protected array $extConf;

    public function __construct(IconFactory $iconFactory, ExtensionConfiguration $extensionConfiguration,
        protected Typo3Version $typo3Version)
    {
        $this->iconFactory = $iconFactory;
        $this->extConf = $extensionConfiguration->get('page_callouts');
    }

    public function __invoke(ModifyPageLayoutContentEvent $event): void
    {
        // check if enabled in Extension Configuration
        if (!$this->getExtensionConfigurationTypeBool('enableCloseButtonInPageModule', true)
                // if TYPO3 version is >= 13, do nothing since TYPO3
            || $this->typo3Version->getMajorVersion() >= 13
        ) {
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
