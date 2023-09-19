FROM php:8.2-apache
ARG DEBIAN_FRONTEND=noninteractive

RUN a2enmod rewrite 

COPY . .

CMD php -S 0.0.0.0:5174
