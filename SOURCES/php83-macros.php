#
# Interface versions exposed by PHP:
#
%php_core_api @PHP_APIVER@
%php_zend_api @PHP_ZENDVER@
%php_pdo_api  @PHP_PDOVER@
%php_version  @PHP_VERSION@

%php_extdir    %{_libdir}/php83/modules

%php_inidir    %{_sysconfdir}/php83/php.d

%php_incldir    %{_includedir}/php83

%__php         %{_bindir}/php83

%__phpize      %{_bindir}/phpize83

%__phpconfig    %{_bindir}/php83-config

%pecl_xmldir   %{_sharedstatedir}/php83/peclxml
