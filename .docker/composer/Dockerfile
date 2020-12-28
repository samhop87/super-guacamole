FROM tough-app

RUN apt-get update && apt-get install -y \
        git \
        zip \
        libzip-dev \
        dos2unix \
    && docker-php-ext-install -j$(nproc) zip

RUN curl -sS https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/ \
    && ln -s /usr/local/bin/composer.phar /usr/local/bin/composer

USER root

COPY docker-entrypoint.sh /bin/docker-entrypoint.sh

RUN chmod +x /bin/docker-entrypoint.sh
RUN dos2unix /bin/docker-entrypoint.sh


ENTRYPOINT ["/bin/docker-entrypoint.sh"]
