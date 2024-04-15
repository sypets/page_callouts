[![TYPO3 11](https://img.shields.io/badge/TYPO3-11-orange.svg)](https://get.typo3.org/version/11)
[![TYPO3 12](https://img.shields.io/badge/TYPO3-12-orange.svg)](https://get.typo3.org/version/12)
[![CI Status](https://github.com/sypets/page_callouts/workflows/CI/badge.svg)](https://github.com/sypets/page_callouts/actions)
[![Downloads](https://img.shields.io/packagist/dt/sypets/page_callouts)](https://packagist.org/packages/sypets/page_callouts)

# TYPO3 extension `page_callouts`

page_callouts makes the following available:

1. Hooking into the page layout module in order to show additional informational
   messages (used by brofix)

2. Show a close button in the page layout module in case it was called from
   another module with the parameter "returnUrl" - in this case we should return
   to this module via the returnUrl on close. This will also be used by brofix.

|                  | URL                                                       |
|------------------|-----------------------------------------------------------|
| **Repository:**  | https://github.com/page_callouts/brofix                   |
| **Read online:** | https://docs.typo3.org/p/sypets/page_callouts/main/en-us/ |
| **TER:**         | https://extensions.typo3.org/extension/page_callouts      |
