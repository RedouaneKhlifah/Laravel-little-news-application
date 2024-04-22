# Laravel News Application API

This Laravel application provides RESTful API endpoints for managing news items and categories.

## Authentication

All API routes except authentication routes are protected by Sanctum authentication middleware.

### Authentication Routes

- `POST /auth/login`: User login.
- `POST /auth/register`: User registration.

## News Routes
### Authenticated Routes

Requires authentication with Sanctum.

- `GET /news`: Retrieves all news items.
- `GET /news/latest-active`: Retrieves the latest active news items in descending order.
- `POST /news`: Creates a new news item.
- `GET /news/{id}`: Retrieves a specific news item by ID.
- `PUT /news/{id}`: Updates a specific news item by ID.
- `DELETE /news/{id}`: Deletes a specific news item by ID.

## Category Routes

### Authenticated Routes

Requires authentication with Sanctum.

- `GET /category`: Retrieves all categories.
- `GET /category/search/{name}`: Searches for a category by name and retrieves it along with all its subcategories recursively.

## Usage

To use this API, make requests to the appropriate endpoints using tools like Postman.

## Installation

1. Clone the repository.
2. Install dependencies: `composer install`.
3. Set up your environment variables: `cp .env.example .env`.
4. seed database with categories: `php artisan db:seed`.
5. Migrate the database: `php artisan migrate`.
6. Start the development server: `php artisan serve`.

import Postman collection : 

[news-test-technique.postman_collection.json](https://github.com/RedouaneKhlifah/Laravel-little-news-application/files/15061544/news-test-technique.postman_collection.json)

