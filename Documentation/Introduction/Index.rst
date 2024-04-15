.. include:: /Includes.rst.txt

.. _introduction:

============
Introduction
============


.. _what-does-it-do:

What does it do?
================

page_callouts makes the following available:

1. Hooking into the page layout module in order to show additional informational
   messages (used by brofix)

2. Show a close button in the page layout module in case it was called from
   another module with the parameter "returnUrl" - in this case we should return
   to this module via the returnUrl on close. This will also be used by brofix.
