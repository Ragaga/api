FROM php:7.2-cli
COPY . /var/www/s3
WORKDIR /var/www/s3
CMD [ "php", "./index.php" ]