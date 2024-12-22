# 使用 PHP 官方映像
FROM php:8.1-apache

# 安裝必要的 PHP 擴展
RUN docker-php-ext-install mysqli pdo pdo_mysql

# 複製專案檔案到容器
COPY . /var/www/html/

# 設定正確的檔案權限
RUN chown -R www-data:www-data /var/www/html

# 設定工作目錄
WORKDIR /var/www/html

# 暴露應用埠
EXPOSE 80

# 啟動 Apache
CMD ["apache2-foreground"]
