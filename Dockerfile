ARG os=10.0.20250606
FROM aursu/php84build:${os}-base

COPY SOURCES ${BUILD_TOPDIR}/SOURCES
COPY SPECS ${BUILD_TOPDIR}/SPECS

RUN chown -R $BUILD_USER ${BUILD_TOPDIR}/{SOURCES,SPECS}

USER $BUILD_USER
ENTRYPOINT ["/usr/bin/rpmbuild", "php84.spec", "--with", "cgi", "--with", "fpm"]
CMD ["-ba"]
