#!/bin/bash

PHP=8.1

# abort on error
set -e

echo "composer install"
Build/Scripts/runTests.sh -p ${PHP} -s composerInstallMax

echo "cgl"
Build/Scripts/runTests.sh -p ${PHP} -s cgl -n

echo "composer validate"
Build/Scripts/runTests.sh -p ${PHP} -s composerValidate

echo "lint"
Build/Scripts/runTests.sh -p ${PHP} -s lint

#echo "phpstan"
#Build/Scripts/runTests.sh -p ${PHP} -s phpstan -e "-c ../Build/phpstan.neon"

#echo "Unit tests"
#Build/Scripts/runTests.sh -p ${PHP} -s unit

#echo "functional tests"
#Build/Scripts/runTests.sh -p ${PHP} -d mariadb -s functional

#echo "done"
