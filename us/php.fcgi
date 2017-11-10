#!/bin/bash
DEFAULTPHPINI=/home/sou32/us/php56-fcgi.ini
exec /usr/local/php5.6/bin/php-cgi -c ${DEFAULTPHPINI}
