#!/bin/bash
export XDEBUG_CONFIG="idekey=PHPSTORM" &&
export PHP_IDE_CONFIG="serverName=squarezone-sapi.local" &&
php "$@"
