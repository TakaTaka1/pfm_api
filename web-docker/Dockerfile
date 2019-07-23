FROM php:7-apache

# change default ftp server for apt-get repository
#RUN sed -i.bak -e "s%http://httpredir.debian.org/debian%http://ftp.jp.debian.org/debian/%g" /etc/apt/sources.list

# recompile php to add extensions
RUN apt-get update && apt-get install -y libfreetype6-dev libjpeg62-turbo-dev libpng-dev libmcrypt-dev zlib1g-dev libicu-dev openssl libxml2-dev libzip-dev
#RUN docker-php-ext-configure --with-openssl
RUN docker-php-ext-install pdo_mysql mbstring xml tokenizer zip gd

# set prepared php.ini file
COPY php.ini /usr/local/etc/php/

# install composer 
RUN curl -f https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# install mysql client
#RUN apt-get install -y mysql-client
RUN apt-get install -y mariadb-client

# mysqlのクライアントのデフォルト文字コードをutf8に変更
RUN { \
   echo '[client]'; \
   echo 'default-character-set=utf8'; \
} > /etc/mysql/conf.d/charset.cnf
 
# 日本語入力環境設定
ENV DEBIAN_FRONTEND noninteractive
RUN apt-get update && apt-get install -y locales
RUN echo "ja_JP.UTF-8 UTF-8" > /etc/locale.gen && \
   locale-gen ja_JP.UTF-8 && \
   dpkg-reconfigure locales && \
   /usr/sbin/update-locale LANG=ja_JP.UTF-8
ENV LC_ALL ja_JP.UTF-8

# システム時刻を日本時間に変更
ENV TZ Asia/Tokyo

# rewriteモジュールを有効にする
RUN a2enmod rewrite

# imagick
#RUN ln -s /usr/lib/php5/20131226/imagick.so /usr/local/lib/php/extensions/no-debug-non-zts-20131226/imagick.so

WORKDIR /var/www/html
