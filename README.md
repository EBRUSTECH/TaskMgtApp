# Laravel Vue Task Management App

This is a task management application built with Laravel (Backend) and Vue.js (Frontend).

## Installation

1. Clone the repository to your local machine
2. Run composer install
3. Run cp .env.example .env to generate .env file
4. Update the following fields in the .env file:
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=your_database_name
   DB_USERNAME=your_database_username
   DB_PASSWORD=your_database_password
5. Generate a new application key by running: php artisan key:generate
6. Run the database migrations to create the tasks table: php artisan migrate
7. Install frontend dependencies using npm: npm install
8. Compile frontend assets using Laravel Mix: npm run dev
9. To start the Laravel development server, run: php artisan serve

## Endpoints

1. GET /api/tasks
2. GET /api/tasks/{id}
3. POST /api/tasks
4. PUT /api/tasks/{id}
5. DELETE /api/tasks/{id}
6. GET /api/mark-tasks/{id}







