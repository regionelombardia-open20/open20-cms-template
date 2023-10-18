FROM elitedivision/open-2.0:8.2-dev

ENV INIT_ENV="Development"
ENV DB_HOST="host"
ENV DB_NAME="databaseuser"
ENV DB_USER="user"
ENV DB_PASS="password"
ENV CMS_PASSWORD="cms_password"

# Install extra dependencies
RUN apt-get update && apt-get install -y php${PHP_VERSION}-ldap

# Copy app & env
COPY --chown=www-data:www-data . /var/www/app
COPY environments /var/www/environment/environments

# Copy Services Files
COPY .docker/service/ /service/

COPY .docker/cron/ /etc/cron.d/