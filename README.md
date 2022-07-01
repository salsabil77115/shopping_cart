<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Description (design and architecture)
 Using MVC Design pattern in laravel , project consist of 3 main components 
 
  - Controller
  - Model
  - View
 we have created 4 Model :

- 1) for Users 
- 2) for products
- 3) for offers
- 4) for Countries
we have created 2 Controllers :

 - 1) for Users 
 - 2) for Product
 
we have several view 
 
 - index.blade.php --->   products page 
 - shopping-cart.blade.php ---> cart view products (here our task calculation)
 - checkout.blade.php --> view for checkout page (not implemented, view only)
 - signup.blade.php
 - signin.blade.php
 - header.blade.php
 
##Run the program 

 1) we call index route '/' --> index.blade.php 
 2) add product to cart then cart number is updated 
 3) after finish shopping go to shipping cart in navbar
 4) here we can see all products with his price and qantity, shipping, VAT, Discounts, total price after Discounts .



