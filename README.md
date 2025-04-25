# Studenti Management System

A web application built with Laravel for managing students' data. This system allows users to create, update, delete, and filter students based on their details like name, surname, class, section, etc.

## Features

- **Add Students**: Easily add new students with their details (name, surname, class, section).
- **Update Students**: Update the existing student details.
- **Delete Students**: Remove students from the database.
- **Filter/Search**: Search and filter students based on different fields such as name, surname, class, and section.
- **Pagination**: View a paginated list of students to easily browse through large amounts of data.
- **Toggle Actions**: Enable or disable modification and deletion actions using a toggle switch.

## Technologies Used

- **Laravel**: PHP framework for backend logic.
- **MySQL**: Database for storing student data.
- **Tailwind CSS**: For styling the application.
- **GitHub**: For version control and collaboration.

## Installation

To run this project locally, follow the steps below:

### 1. Clone the repository

```bash
git clone https://github.com/yourusername/studenti-management.git
cd studenti-management
```

### 2. Install dependencies
Make sure you have PHP and Composer installed. Run the following command to install the required dependencies:

```bash
composer install
```
### 3. Set up the environment
Copy the .env.example file to .env:

```bash
cp .env.example .env
```

Then, configure your database settings in the .env file:

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_username
DB_PASSWORD=your_database_password
```
### 4. Migrate the database
Make sure you have a MySQL database set up. Run the following command to migrate the database schema:

```bash
php artisan migrate
```

### 5. Serve the application
Now, you can run the application locally:

```bash
php artisan serve
```
