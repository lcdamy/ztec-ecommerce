# ZTECH (E-commerce test)

## Description

> To use this E-commerce APP you must create an admin account, to do that just register using the UI after install the application and change the role to be `admin` other users `clients` will just visit the site, and if the you want to buy the will need to create an account of course.

Enjoy!

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
-APP_NAME it is what is being displayed as Log
# For email i have used mailtrap.io
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

### Developers

-   Peter
