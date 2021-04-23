# Contributing

Contributions are welcome. Please open issues to report bugs and
create PR to propose changes.

A similar testing workflow to the TYPO3 core is used.

For more information, see 

* the file .github/workflows/tests.yml 
* the documentation on https://docs.typo3.org/m/typo3/reference-coreapi/10.4/en-us/Testing/ExtensionTesting.html.

## CGL

Please adhere to the TYPO3 core coding Guidelines.

Use .editorconfig in this directory.

You can fix the CGL with the included scripts:

```
Build/Scripts/runTests.sh -h
```

If there is some problem, use runTests.sh with the -v option (for verbose).

Check all PHP files (dry-run, do not fix):

```
Build/Scripts/runTests.sh -s cgl -n -v
```

Check **and fix** CGL in PHP files:

```
Build/Scripts/cglFixMyCommit.sh -s cgl -v
```

