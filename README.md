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
> php artisan storage:link
# Change the .env on the following variables
# For images plz enable storage to be readable, you will find an error like the follow if you add a product without running that command
`Intervention\Image\Exception\NotReadableException
Image source not readable`
# For email i have used mailtrap.io, if you see any error like the follow
`Swift_TransportException
Cannot send message without a sender address`
# please create a mailtrap and fill everything
-MAIL_USERNAME={}
-MAIL_PASSWORD={}
-MAIL_FROM_ADDRESS={}
# make sure that you have a mysql database and running
> php artisan migrate
# To generate some default keys, plz run
> php artisan key:generate
> php artisan passport:client --personal
> php artisan passport:keys

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
