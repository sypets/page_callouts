.. include:: /Includes.rst.txt

.. _start:

=================
page_callouts
=================

:Extension key:
      page_callouts

:Version:
      |release|

:Language:
      en

:Author:
      Sybille Peters

:License:
      Open Content License available from `www.opencontent.org/opl.shtml
      <http://www.opencontent.org/opl.shtml>`_

----

This is a TYPO3 extension which adds some features to the page module. It
was originally intended to be used along with EXT:brofix, but the features
are also available in combination with other extension.

page_callouts makes the following available:

1. Hooking into the page layout module in order to show additional informational
   messages (used by brofix)

2. Show a close button in the page layout module in case it was called from
   another module with the parameter "returnUrl" - in this case we should return
   to this module via the returnUrl on close. This will also be used by brofix.

----

The content of this document is related to TYPO3, a GNU/GPL CMS/Framework
available from `www.typo3.org <https://www.typo3.org/>`_

----


.. toctree::
   :maxdepth: 1
   :titlesonly:

   Introduction/Index
   Installation/Index
   ForDevelopers/Index
   Changelog/Index
   Sitemap

