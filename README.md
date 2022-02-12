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

### How i developed this Application

-   Design my mock-up on paper
-   Design table schema on paper
-   creation of migrations and Model
-   creation of Controller and views

### some of the feature, i would like to star are

-   I have one seeder to create currency record at the migration stage
-   I have create Events that are triggered when someone buy a product. It is there to reduce the top-up account and also to reduce the product quantity
-   I have also created audits table to track the addition of the product in table
-   I have created a frontend in js (vuejs) when you are buying a product. for this one i have used axios as it is the one shipped with laravel
-   I have integrated a library called "Intervention" to help me resize my image, so they look great on the website

### Developers

-   Peter
