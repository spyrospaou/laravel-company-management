# Laravel Company Management System

## Project Description
This is a Laravel application that implements a company management system. It allows users to register, log in, and manage their own companies. The system demonstrates core Laravel functionality, including authentication, CRUD operations, and relationships between users and companies.

## Features
- User Authentication (register, login)
- CRUD operations for companies (Create, Read, Update, Delete)
- One-to-many relationship between users and companies
- Each user can only view and manage their own companies

## Technologies Used
- Laravel
- MySQL
- Docker
- Tailwind CSS

## Environment Configuration
This project uses two separate environment files:
1. `.env` in the root folder for Docker-related environment variables.
2. `src/.env` for Laravel-specific environment variables.

This separation allows for better management of Docker settings and application-specific configurations.

## Setup Instructions

### Prerequisites
- Docker and Docker Compose installed on your system

### Steps to Run the Project Locally
1. Clone the repository:
   ```
    git clone https://github.com/spyrospaou/laravel-company-management.git
    cd laravel-company-management
   ```

2. Environment setup:
   - Copy `.env.sample` to `.env` in the root folder and update if necessary.
   - Copy `src/.env.example` to `src/.env` and update the database credentials if necessary.

3. Build and start the Docker containers:
   ```
   docker-compose up -d
   ```

4. Install PHP dependencies:
   ```
   docker-compose exec app composer install
   ```

5. Generate application key:
   ```
   docker-compose exec app php artisan key:generate
   ```

6. Run database migrations:
   ```
   docker-compose exec app php artisan migrate
   ```

7. Install and compile frontend assets:
   ```
   docker-compose exec app npm install
   docker-compose exec app npm run dev

Make sure to check the console output to see which port Vite is actually using
   ```

8. Access the application in your web browser at `http://localhost:8888`

## Running Tests
To run the unit tests, use the following command: docker-compose exec app php artisan test --filter=UserCompanyTest


## Assumptions and Considerations
- The application uses a Docker-based development environment for ease of setup and consistency across different systems.
- The company management features are restricted to authenticated users only.
- Each company is associated with a single user, and users can have multiple companies.
- The front-end design uses Tailwind CSS for styling.

## Future Improvements
- Implement pagination for the company list
- Add more comprehensive form validation
- Enhance the UI/UX with more advanced Tailwind CSS components