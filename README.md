# ZTECH (E-commerce test)

## Description

> This is a project done to test the capability and undestanding of Laravel framework

## How to install and run this project

#### Prerequisite

Make sure you have the following installed on your computer before you proceed.

-   Git
-   Node.js
-   Mysql
-   Composer
-   Laravel

Now you can proceed to project installation.

```bash
# Clone the project
> git clone https://github.com/lcdamy/ztec-ecommerce.git
# move to the ztec-ecommerce folder install all packages
> cd ztec-ecommerce
> npm install
> composer install
# Change the .env on the following variables
-`APP_NAME` it is what is being displayed as Log

-DB_HOST
-DB_PORT
-DB_DATABASE
-DB_USERNAME
-DB_PASSWORD

-MAIL_-MAILER=smtp
-MAIL_HOST=smtp.-mailtrap.io
-MAIL_PORT=2525
-MAIL_USERNAME=null
-MAIL_PASSWORD=null
-MAIL_ENCRYPTION=null
-MAIL_FROM_ADDRESS=null
-MAIL_FROM_NAME="{}"

# make sure that you have a mysql database and running
> php artisan migrate

```

Now you can RUN it.

```bash
# Run the server
> php artisan serve
# Open a new terminal and run node
> npm run dev
```

### How i developed this Application

-

### Developers

-   Peter
