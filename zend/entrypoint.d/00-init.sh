#!/bin/bash
echo "-- First container startup --"
# YOUR_JUST_ONCE_LOGIC_HERE

set -e

cd /var/www/open20

composer install

php requirements.php

# putting yii file in the right folders before php init command
mkdir -p ./tests/codeception/bin/yii \
    && cp ./vendor/bin/yii ./tests/codeception/bin/yii

php init --env="Development" --overwrite=All

# With parameter interactive 0 we start migration without prompt "yes"
echo
echo "-------------- START YII MIGRATE --------------"
php yii.orig migrate up --interactive=0
echo "-------------- END YII MIGRATE --------------"

echo "-------------- START LUYA MIGRATE --------------"
php vendor/bin/luya migrate --interactive=0
echo "-------------- END LUYA MIGRATE --------------"

echo "-------------- START LUYA IMPORT --------------"
php vendor/bin/luya import
echo "-------------- END LUYA IMPORT --------------"

# Execute admin/setup command with English as default language
echo "-------------- CREATE DEFAULT ACCOUNT --------------"
php vendor/bin/luya admin/setup --email=test@syllabus.gov.it --password=test --firstname=Test --lastname=Syllabus --interactive=0
echo "-------------- END CREATE DEFAULT ACCOUNT --------------"

set +e