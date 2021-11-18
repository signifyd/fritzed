FROM php:7-apache

COPY ./app /var/www/html
COPY ./database /var/www/database
RUN mkdir /var/www/docs
COPY README.md /var/www/docs

RUN cd .. && chown www-data. . -R
