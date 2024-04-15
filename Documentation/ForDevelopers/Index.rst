.. include:: /Includes.rst.txt


==============
For Developers
==============

How it works
============

This extension Xclasses the PageLayoutController of the TYPO3 core.
The class is inherited and the method getHeaderFlashMessagesForCurrentPid()
overriden.

All functions which use the hook are called and the additional messages
rendered.


How to use the hook
===================

Simple example:

ext_localconf.php:

.. code-block::

    // ...
    $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['Sypets/PageCallouts/Xclass/PageLayoutControllerWithMessages']['addFlashMessageToPageModule'][] =
        \Myvendor\MyExtension\Hooks\PageCalloutsHook::class;


Classes\Hooks\PageCalloutsHook.php:

.. code-block::

   <?php
   declare(strict_types=1);
   namespace Myvendor\MyExtension\Hooks;

   use TYPO3\CMS\Core\Localization\LanguageService;
   use TYPO3\CMS\Core\Utility\GeneralUtility;
   use TYPO3\CMS\Fluid\ViewHelpers\Be\InfoboxViewHelper;

   final class PageCalloutsHook
   {
       public function addMessages(array $pageInfo): array
       {
           $pageId = (int) ($pageInfo['uid']);
           $doktype = (int) ($pageInfo['doktype'] ?? 0);

           if ($someCondition) {
               $title = 'Some title';
               $message = 'some message';
               return [
                   'title' => $title,
                   'message' => $message,
                   'state' => InfoboxViewHelper::STATE_ERROR
               ];
           }
           return [];
       }
   }
