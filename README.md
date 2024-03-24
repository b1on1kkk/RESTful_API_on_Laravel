# Backend Laravel 

This repository contains the backend code for a Laravel application that provides a RESTful API for managing posts. The application is built using a microservice architecture and is deployed using Docker containers.

## Project Description

This project demonstrates a basic implementation of a RESTful API using Laravel. It allows users to perform CRUD operations on posts, including creating, reading, updating, and deleting them. 

The application is built using a microservice architecture, with separate containers for NGINX, PHP-Laravel, and PostgreSQL. This allows for better scalability and maintainability. 

## Technologies Used

* Laravel
* PHP
* MySQL
* NGINX
* Docker/Docker Compose

## Installation and Setup

1. Clone the repository: `git clone https://github.com/b1on1kkk/backend_laravel.git`
2. Install dependencies: `composer install`
3. Copy the `.env.example` file to `.env` and fill in the required environment variables.
4. Generate an application key: `php artisan key:generate`
5. Run migrations: `php artisan migrate`
6. Seed the database (if applicable): `php artisan db:seed`
7. Build and run the Docker containers: 
    * `docker-compose build`
    * `docker-compose up -d`

## Usage

The application exposes a RESTful API for managing posts. The following endpoints are available:

| Operation | HTTP Method | Route (URL) |
|---|---|---|
| Get all posts | GET | `/api/posts` |
| Get a specific post | GET | `/api/posts/{post}` |
| Create a post | POST | `/api/posts` |
| Update a post | PUT | `/api/posts/{post}` |
| Delete a post | DELETE | `/api/posts/{post}` |

You can use any HTTP client to interact with the API. 
