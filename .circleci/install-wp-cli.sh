#!/usr/bin/env bash
curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar
chmod +x wp-cli.phar
./wp-cli.phar core download
./wp-cli.phar config create --dbname=${DB_NAME} --dbuser=${DB_USER} --dbhost=${DB_HOST} --dbpass=${DB_PASSWORD} --skip-check
./wp-cli.phar core install --admin_name=${WP_ADMIN} --admin_password=${WP_PASSWORD} --admin_email=${WP_EMAIL} --url=${WP_URL} --title=WordPress
