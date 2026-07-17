ARG os=10.2.20260525.0
ARG image=devbase
FROM ghcr.io/rpmbsys/php84build:${os}-${image}

RUN curl -sSL https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
