FROM cr.zend.com/zendphp/8.2:alpine-3.18-apache
ARG ZENDPHP_REPO_USERNAME=""
ARG ZENDPHP_REPO_PASSWORD=""

# PROXY SUPPORT
ARG http_proxy=""
ARG https_proxy=""
RUN echo "export http_proxy=$http_proxy" >> /etc/profile.d/env.sh \
    && echo "export https_proxy=$https_proxy" >> /etc/profile.d/env.sh

ARG INSTALL_COMPOSER=true

ARG ZEND_PROFILE="development"
# Supply a space- or comma-separated list of additional OS packages to install
ARG SYSTEM_PACKAGES="curl libmcrypt tzdata"
# Supply a space- or comma-separated list of additional extensions to install
ARG ZEND_EXTENSIONS_LIST="pdo mysql redis xdebug apc apcu gd memcached imagick intl smtp soap mcrypt bcmath mbstring xml zip curl ldap"
# Supply a space- or comma-separated list of additional PECL modules to compile
ARG PECL_EXTENSIONS_LIST
# Supply a space- or comma-separated list of additional Apache modules to load/enable
ARG APACHE_MODULES="mod_rewrite"
# Supply a bash script name to run after ZendPHP customizations are complete
ARG POST_BUILD_BASH=""

## Prepare tzdata
ENV PROFILE=$ZEND_PROFILE
ENV TZ=Europe/Rome

RUN ZendPHPCustomizeWithBuildArgs.sh

# Loading services customizations
COPY ./zend/entrypoint.d /entrypoint.d

# Resolve (38) Function not implemented: AH00023: Couldn't create the mpm-accept mutex
RUN echo "Mutex posixsem" >> /etc/apache2/httpd.conf
