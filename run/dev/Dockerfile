ARG os=10.1.20251126
ARG image=devbase
FROM ghcr.io/rpmbsys/php84build:${os}-${image}

RUN curl -sSL https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
