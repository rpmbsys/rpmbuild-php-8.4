ARG os=9.4.20240523
ARG image=devbase
FROM aursu/php83build:${os}-${image}

RUN curl -sSL https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
