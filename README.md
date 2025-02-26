# Twooter Blog

## Overview

This project is a web application that consists of a backend built with the Laravel framework and a frontend built with Vue.js. The application provides various features including user management, product management, and post management. Created with the knowledge from the Advanced Web Designing class ~~and countless hours of watching random tutorials on YouTube while having absolutely zero idea of what was happening.~~

## Special Thanks

Special thanks to my professor, Ms. Le Thu for her guidance throughout the course of this class. Also, thanks to Board Infinity from Coursera for providing me with the precious resource and knowledge about the Laravel framework.

## Project Structure

## Backend

The backend is built with Laravel and provides the API and business logic for the application.

### Key Directories

- **app/**: Contains the core application code.
  - **Http/**: Contains controllers, middleware, and requests.
  - **Models/**: Contains Eloquent models.
  - **Providers/**: Contains service providers.
  - **Services/**: Contains service classes.

- **config/**: Contains configuration files.
  - **app.php**: General application configuration.
  - **auth.php**: Authentication configuration.
  - **cache.php**: Cache configuration.
  - **cors.php**: CORS configuration.
  - **database.php**: Database configuration.
  - **queue.php**: Queue configuration.

- **database/**: Contains database-related files.
  - **factories/**: Contains model factories.
  - **migrations/**: Contains database migrations.
  - **seeders/**: Contains database seeders.

- **routes/**: Contains route definitions.
  - **api.php**: API routes.
  - **console.php**: Console routes.
  - **web.php**: Web routes.

### Installation

1. Navigate to the `Backend` directory.
2. Install dependencies:
```
composer install
```
3. Copy the `.env.example` file to `.env` and configure your environment variables.
4. Generate an application key:
```
php artisan key:generate
```
5. Run the database migrations:
```
php artisan migrate
```

**To run the backend server**:
```
php artisan serve
```

## Frontend

THe frontend is built with Vue.js and provides the user with interface of the application.

### Key Directories

- **src/**: Contains the source code for the frontend.
    - **components/**: Contains Vue components.
    - **assets/**: Contains static assets.
    - **router/**: Contains route definitions.
    - **store/**: Contains Vuex store modules.

### Installation
1. Navigate to the `Frontend` directory.
2. Install dependencies:
```
npm install
```

**To run the frontend server**:
```
npm run dev
```

## License