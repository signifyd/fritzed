FROM php:7-apache

COPY ./app /var/www/html
COPY ./database /var/www/database
COPY ./docs /var/www/docs
COPY ./*.md /var/www/docs

RUN cd .. && chown www-data. . -R
