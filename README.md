<br/>

It is a backend system for an E-Commerce built with the Laravel framework, provides a simple and secure platform for online buying and selling. With features like user authentication, and product management.

## Features
- User authentication with different levels of access (admin, vendor)
- User login/signup using Google or creating an account
- Admin privileges for managing the entire system
- Vendor capabilities to manage their own shop
- CRUD operations for managing brands, coupons, products, categories, and subcategories
- Automatic coupon deactivation using events in MySQL ( No need to do it manually )


## Built With

* PHP
* Laravel
* MySql
* Ajax
* Composer

## Getting Started

To get a local copy up and running follow these simple steps.

### Prerequisites

* install php 8 or above
* install apache2 ( or any local serve )
* install mysql
* install composer

### Installation

1. Clone the repo

```sh
   (https://github.com/Allybh053/eCommerce-Vendor.git)
```

2. Import the database file from the folder "SQL File"
3. Make your own copy of the .env file
```sh
    cp .env.example .env
 
    DB_DATABASE= your db name here
    DB_USERNAME= your db username
    DB_PASSWORD= your password 
```

4. Install dependecies

```sh
    composer install
```
5. Generate a key
```sh
    php artisan key:generate
```
6. Start Running
```sh
    php artisan serve
```
<img width="908" alt="1" src="https://github.com/user-attachments/assets/6bb7a7d7-bb80-4051-beee-41a10bd23f7a">


-  Directly create a pull request after you edit the files with necessary changes.

### Creating A Pull Request

1. Fork the Project
2. Create your Feature Branch (`git checkout -b feature/AmazingFeature`)
3. Commit your Changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the Branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request
