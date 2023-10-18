# Install Vendors
composer install

# Init
cd /var/www/app/ && php init --env="${INIT_ENV}" --overwrite=All --root=../environment

if [ -f '/var/www/app/common/config/main-local.php' ] ; then
    echo "Configuring The Database ${DB_USER}:*****@${DB_HOST}:${DB_NAME}"
    sed -i "s/DBHOST/${DB_HOST}/" /var/www/app/common/config/main-local.php
    sed -i "s/DBNAME/${DB_NAME}/" /var/www/app/common/config/main-local.php
    sed -i "s/DBUSER/${DB_USER}/" /var/www/app/common/config/main-local.php
    sed -i "s/DBPASS/${DB_PASS}/" /var/www/app/common/config/main-local.php
    cat /var/www/app/common/config/main-local.php
else
    echo "No Application To Configure"
fi

# Wait for DB to be Ready
sleep 10

# Run Migrations to Setup Database
echo "-------------- RUN MIGRATIONS --------------"
cd /var/www/app/ && php open2 migrate up --interactive=0 > /dev/stdout


# Run CMS Migrations
echo "-------------- RUN CMS MIGRATIONS --------------"
cd /var/www/app/ && php vendor/bin/luya migrate --interactive=0 > /dev/stdout

# Run Migrations for Italian Language - ONLY FOR NEW WEBSITE
echo "-------------- RUN MIGRATIONS FOR LANGUAGE AND DEFAULT PAGES --------------"
cd /var/www/app/ && php open2 migrate --migrationPath="@frontend/migrations/language" --interactive=0 > /dev/stdout

# Setup CMS Environment
echo "-------------- SETUP CMS --------------"
cd /var/www/app/ && php vendor/bin/luya import
php vendor/bin/luya admin/setup --email=admin@open2.localapplication --password="${CMS_PASSWORD}" --firstname=Admin --lastname=User --interactive=0


# Run Migrations for Language and Default Page Login - ONLY FOR NEW WEBSITE
echo "-------------- RUN MIGRATIONS FOR DEFAULT PAGES --------------"
cd /var/www/app/ && php open2 migrate --migrationPath="@frontend/migrations/after" --interactive=0 > /dev/stdout

