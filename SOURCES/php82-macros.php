#
# Interface versions exposed by PHP:
#
%php_core_api @PHP_APIVER@
%php_zend_api @PHP_ZENDVER@
%php_pdo_api  @PHP_PDOVER@
%php_version  @PHP_VERSION@

%php_extdir    %{_libdir}/php82/modules

%php_inidir    %{_sysconfdir}/php82/php.d

%php_incldir    %{_includedir}/php82

%__php         %{_bindir}/php82

%pecl_xmldir   %{_sharedstatedir}/php82/peclxml
