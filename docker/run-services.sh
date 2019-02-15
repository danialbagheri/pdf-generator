#!/bin/bash

exec /etc/init.d/nginx restart &
exec /etc/init.d/php7.1-fpm restart &
exec sleep 10000000000000