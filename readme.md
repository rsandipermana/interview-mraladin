
<p  align="center"><img  src="https://laravel.com/assets/img/components/logo-laravel.svg">


<a  href="https://travis-ci.org/laravel/framework"><img  src="https://travis-ci.org/laravel/framework.svg"  alt="Build Status"></a> <a  href="https://packagist.org/packages/laravel/framework"><img  src="https://poser.pugx.org/laravel/framework/d/total.svg"  alt="Total Downloads"></a> <a  href="https://packagist.org/packages/laravel/framework"><img  src="https://poser.pugx.org/laravel/framework/v/stable.svg"  alt="Latest Stable Version"></a> <a  href="https://packagist.org/packages/laravel/framework"><img  src="https://poser.pugx.org/laravel/framework/license.svg"  alt="License"></a>
</p>
  

## About Project

This project special for Mister Aladin.
Required: Docker-compose

Step to install this project :

 1. `docker-compose up` to run the application
 2. `docker-compose exec app composer install` will generate depedencies in vendor folder
 3. `cp .env.example .env` to copy environtment configuration
 4. `docker-compose exec app php artisan migrate`
 5. Project will run on http://localhost:8088, and check database on http://localhost:8081 (user: **root** password: **secret**)

Project created with Laravel Framework, included:
-  Get Short URL and Redirect to Long URL
-  Create Long URL and Generate Short URL (format: MA-randomURL)
-  Update Direct URL
-  Delete Direct URL

## GET

Direct Short URL to Long URL
-   **URL:** http://localhost:8088/:shorturl
-   **Method:** `GET`

Example URL:
http://localhost:8088/MA-LS5NA
You will redirect to:
http://misteraladin.com/hotel/search?q=jakarta&m=12&d=1

## CREATE

Generate Short URL
-   **URL:** http://localhost:8088/api/direct/create
-   **Method:** `POST`
-   **URL Params required**
    longurl=[string]

Example Response:

    {
    "message": "data successfully created",
    "data": {
        "shorturl": "MA-LS5NA",
        "longurl": "http://misteraladin.com/hotel/search?q=jakarta&m=12&d=1",
        "updated_at": "2019-08-19 17:07:12",
        "created_at": "2019-08-19 17:07:12",
        "id": 10
    }
    }

## UPDATE

Update Long URL
-   **URL:** http://localhost:8088/api/direct/update
-   **Method:** `POST`
-   **URL Params required**
	id=[integer]
    longurl=[string]
    
Example Response:

    {
    "message": "data successfully updated"
    }

## DELETE

Delete URL by ID
-   **URL:** http://localhost:8088/api/direct/delete/:id
-   **Method:** `DELETE`
    
Example Response:

    {
    "message": "data successfully deleted"
    }


## THANKS
The Laravel framework is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT). 
Project special for [Mister Aladin](https://www.misteraladin.com).
Project developed by  [Sandi Permana](https://permana.id)
