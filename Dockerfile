FROM romeoz/docker-nginx-php:7.1
ADD . /var/www/app/
WORKDIR /var/www/app/
CMD ["/usr/bin/supervisord"]
