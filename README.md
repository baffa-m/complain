# Student Complaint Project

# Project Setup Guide

This guide provides step-by-step instructions for setting up this project.

## Prerequisites

Ensure you have the following installed on your system:

- [PHP](https://www.php.net/) (version 8.0 or higher recommended)
- [Composer](https://getcomposer.org/)
- [Node.js](https://nodejs.org/) and npm
- [MySQL](https://www.mysql.com/) or another supported database

## Steps to Set Up the Project

### 1. Clone the Repository


### 2. Install Dependencies

Run the following command to install PHP dependencies using Composer:

```bash
composer install
```

Install JavaScript dependencies with npm:

```bash
npm install
```

### 3. Set Up the Environment File

Create a `.env` file by copying the `.env.example` file:

```bash
cp .env.example .env
```

Update the `.env` file with your environment-specific configuration:

- **Database Settings**:
  ```This project uses sqlite database
  
  ```

### 4. Generate an Application Key

Run the following command to generate a unique application key:

```bash
php artisan key:generate
```

### 5. Run Database Migrations

Run the migrations to set up the database structure:

```bash
php artisan migrate
```


### 6. Build Frontend Assets

 Compile Tailwind css assets with:

```bash
npm run dev
```

For a production build, use:

```bash
npm run build
```

### 7. Start the Development Server

Run the Laravel development server with:

```bash
php artisan serve
```

The application will be available at `http://127.0.0.1:8000` by default.

