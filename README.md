[news-test-technique.postman_collection.json](https://github.com/RedouaneKhlifah/Laravel-little-news-application/files/15068846/news-test-technique.postman_collection.json)# Laravel News Application API

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

You can import the Postman collection from this link: 
[Uploading news-test-technique.postman_col{
	"info": {
		"_postman_id": "81d0824f-9b87-44be-a825-e2668921779e",
		"name": "news-test-technique",
		"schema": "https://schema.getpostman.com/json/collection/v2.1.0/collection.json",
		"_exporter_id": "34093186",
		"_collection_link": "https://www.postman.com/navigation-saganist-31505510/workspace/redouane-khlifah/collection/34093186-81d0824f-9b87-44be-a825-e2668921779e?action=share&source=collection_link&creator=34093186"
	},
	"item": [
		{
			"name": "Auth",
			"item": [
				{
					"name": "register",
					"event": [
						{
							"listen": "test",
							"script": {
								"exec": [
									"\r",
									""
								],
								"type": "text/javascript",
								"packages": {}
							}
						}
					],
					"request": {
						"auth": {
							"type": "bearer",
							"bearer": [
								{
									"key": "token",
									"value": "3|P25JmkL98xfXx2k5I1Cregr8yhMaIg29QpK7myT9ddd9c220",
									"type": "string"
								}
							]
						},
						"method": "POST",
						"header": [
							{
								"key": "Accept",
								"value": "application/json",
								"type": "text"
							}
						],
						"body": {
							"mode": "raw",
							"raw": "{\r\n    \"name\" : \"test\",\r\n    \"email\" : \"test3@gmail.com\",\r\n    \"password\" : \"testing1234\"\r\n\r\n}\r\n",
							"options": {
								"raw": {
									"language": "json"
								}
							}
						},
						"url": {
							"raw": "http://localhost:8000/api/auth/register",
							"protocol": "http",
							"host": [
								"localhost"
							],
							"port": "8000",
							"path": [
								"api",
								"auth",
								"register"
							]
						}
					},
					"response": []
				},
				{
					"name": "login",
					"request": {
						"method": "POST",
						"header": [
							{
								"key": "Accept",
								"value": "application/json",
								"type": "text"
							}
						],
						"body": {
							"mode": "raw",
							"raw": "{\r\n    \"email\" : \"test55@gmail.com\",\r\n    \"password\" : \"testing1234\"\r\n}\r\n",
							"options": {
								"raw": {
									"language": "json"
								}
							}
						},
						"url": {
							"raw": "http://localhost:8000/api/auth/login",
							"protocol": "http",
							"host": [
								"localhost"
							],
							"port": "8000",
							"path": [
								"api",
								"auth",
								"login"
							]
						}
					},
					"response": []
				}
			]
		},
		{
			"name": "news",
			"item": [
				{
					"name": "Get all news",
					"protocolProfileBehavior": {
						"disableBodyPruning": true
					},
					"request": {
						"auth": {
							"type": "bearer",
							"bearer": [
								{
									"key": "token",
									"value": "3|P25JmkL98xfXx2k5I1Cregr8yhMaIg29QpK7myT9ddd9c220",
									"type": "string"
								}
							]
						},
						"method": "GET",
						"header": [
							{
								"key": "Accept",
								"value": "application/json",
								"type": "text"
							}
						],
						"body": {
							"mode": "raw",
							"raw": "",
							"options": {
								"raw": {
									"language": "json"
								}
							}
						},
						"url": {
							"raw": "http://localhost:8000/api/news",
							"protocol": "http",
							"host": [
								"localhost"
							],
							"port": "8000",
							"path": [
								"api",
								"news"
							]
						}
					},
					"response": []
				},
				{
					"name": "Get news latest-active",
					"request": {
						"method": "GET",
						"header": [],
						"url": {
							"raw": "http://localhost:8000/api/news/latest-active",
							"protocol": "http",
							"host": [
								"localhost"
							],
							"port": "8000",
							"path": [
								"api",
								"news",
								"latest-active"
							]
						}
					},
					"response": []
				},
				{
					"name": "Add new News",
					"request": {
						"auth": {
							"type": "bearer",
							"bearer": [
								{
									"key": "token",
									"value": "2|dfk9ZvM1DO3YmyMHog6OvyxB1fLnSnwrUcoR6fpt4c9e6620",
									"type": "string"
								}
							]
						},
						"method": "POST",
						"header": [
							{
								"key": "Accept",
								"value": "application/json",
								"type": "text"
							}
						],
						"body": {
							"mode": "raw",
							"raw": "{\r\n    \"titre\": \"News Title 1\",\r\n    \"contenu\": \"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam\",\r\n    \"categorie\": 1,\r\n    \"date_debut\": \"2024-04-25\",\r\n    \"date_expiration\": \"2024-05-25\"\r\n}",
							"options": {
								"raw": {
									"language": "json"
								}
							}
						},
						"url": {
							"raw": "http://localhost:8000/api/news",
							"protocol": "http",
							"host": [
								"localhost"
							],
							"port": "8000",
							"path": [
								"api",
								"news"
							]
						}
					},
					"response": []
				},
				{
					"name": "update new",
					"request": {
						"auth": {
							"type": "bearer",
							"bearer": [
								{
									"key": "token",
									"value": "7|hmHiR9M44RZ7gBiNaR2fHCKFzZVwe0UmFRBGuwfv4f7ebf16",
									"type": "string"
								}
							]
						},
						"method": "PUT",
						"header": [
							{
								"key": "Accept",
								"value": "application/json",
								"type": "text"
							}
						],
						"body": {
							"mode": "raw",
							"raw": "{\r\n    \"titre\": \"News Title updated\",\r\n    \"contenu\": \"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam\",\r\n    \"categorie\": \"Politique\",\r\n    \"date_debut\": \"2024-04-25\",\r\n    \"date_expiration\": \"2024-05-25\"\r\n}",
							"options": {
								"raw": {
									"language": "json"
								}
							}
						},
						"url": {
							"raw": "http://localhost:8000/api/news/1",
							"protocol": "http",
							"host": [
								"localhost"
							],
							"port": "8000",
							"path": [
								"api",
								"news",
								"1"
							]
						}
					},
					"response": []
				},
				{
					"name": "Delete One new",
					"request": {
						"auth": {
							"type": "bearer",
							"bearer": [
								{
									"key": "token",
									"value": "7|hmHiR9M44RZ7gBiNaR2fHCKFzZVwe0UmFRBGuwfv4f7ebf16",
									"type": "string"
								}
							]
						},
						"method": "DELETE",
						"header": [],
						"url": {
							"raw": "http://localhost:8000/api/news/1",
							"protocol": "http",
							"host": [
								"localhost"
							],
							"port": "8000",
							"path": [
								"api",
								"news",
								"1"
							]
						}
					},
					"response": []
				}
			]
		},
		{
			"name": "category",
			"item": [
				{
					"name": "category",
					"request": {
						"auth": {
							"type": "bearer",
							"bearer": [
								{
									"key": "token",
									"value": "7|hmHiR9M44RZ7gBiNaR2fHCKFzZVwe0UmFRBGuwfv4f7ebf16",
									"type": "string"
								}
							]
						},
						"method": "GET",
						"header": [],
						"url": {
							"raw": "http://localhost:8000/api/category",
							"protocol": "http",
							"host": [
								"localhost"
							],
							"port": "8000",
							"path": [
								"api",
								"category"
							]
						}
					},
					"response": []
				},
				{
					"name": "category search",
					"protocolProfileBehavior": {
						"disableBodyPruning": true
					},
					"request": {
						"method": "GET",
						"header": [],
						"body": {
							"mode": "urlencoded",
							"urlencoded": []
						},
						"url": {
							"raw": "http://localhost:8000/api/category/search/",
							"protocol": "http",
							"host": [
								"localhost"
							],
							"port": "8000",
							"path": [
								"api",
								"category",
								"search",
								""
							]
						}
					},
					"response": []
				}
			]
		}
	],
	"auth": {
		"type": "bearer",
		"bearer": [
			{
				"key": "token",
				"value": "3|P25JmkL98xfXx2k5I1Cregr8yhMaIg29QpK7myT9ddd9c220",
				"type": "string"
			}
		]
	},
	"event": [
		{
			"listen": "prerequest",
			"script": {
				"type": "text/javascript",
				"packages": {},
				"exec": [
					""
				]
			}
		},
		{
			"listen": "test",
			"script": {
				"type": "text/javascript",
				"packages": {},
				"exec": [
					""
				]
			}
		}
	],
	"variable": [
		{
			"key": "token",
			"value": "\"\""
		}
	]
}lection.json…]()



