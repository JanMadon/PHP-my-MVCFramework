# php-mvc

## Introduction

php-mvc is a simple PHP framework designed for educational purposes. It allows you to quickly build web applications following the Model-View-Controller (MVC) pattern, making it easier to separate concerns and organize your codebase.

## Features

- **MVC Architecture**: Built on the Model-View-Controller (MVC) pattern for better code organization.
- **Easy to Use**: Simple syntax and easy-to-understand functions make it beginner-friendly.
- **Configurable Routing**: Define custom routes easily for your application.
- **Model Layer**: Provides models for interacting with the database.
- **Views**: Utilizes view templates for separating presentation logic.
- **Session Support**: Integrated session support for user management.
- **Security**: Basic security measures such as input data filtering and CSRF protection.

## Installation

1. Clone the repository to your local system:

    ```
    git clone https://github.com/JanMadon/PHP-my-MVCFramework.git
    ```

2. Navigate to the project directory:

    ```
    cd PHP-my-MVCFramework
    ```

3. Install dependencies using Composer:

    ```
    composer install
    ```

4. Copy the .env.example file to .env
 
     ```
    cp .env.example .env
    ```

## Getting Started

1. Define new routes in `routes/web.php`.
2. Create controllers in the `app/Controllers` directory.
3. Define models in the `app/Models` directory if you need to interact with the database.
4. Create views in the `resources/views` directory.
5. Start building your application using the MVC structure.

## Examples

### Defining Routes

```php
Router::get('/', 'HomeController@index');
Router::post('/login', 'AuthController@login');
