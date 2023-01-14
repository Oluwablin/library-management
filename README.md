## Library Management 

## Project Description

This aplication is about RESTful APIs for a single database multi-tenant Library Management Board.

This includes the following:

### Super Admin Panel
• Create record
• Edit a record
• Delete a record
• List all record
• View all libraries
• Create library
• Edit a library
• Delete a library
• Create student or user
• Edit a student or user
• Delete a student or user
• List all students or users

### Admin View
• Create new tenant/user in same library
• Update a tenant/user in same library
• Delete a tenant/user in same library
• List all tenants/users in same library
• List all records in same library
• View a record in same library
• View a library

### User Panel
• View a record
• View a library

## Project Setup

### Cloning the GitHub Repository

Clone the repository to your local machine by running the terminal command below.

```bash
git clone https://github.com/Oluwablin/library-management
```

### Setup Database

Create a MySQL database and note down the required connection parameters. (DB Host, Username, Password, Name)

### Install Composer Dependencies

Navigate to the project root directory via terminal and run the following command.

```bash
composer install
```

### Create a copy of your .env file

Run the following command

```bash
cp .env.example .env
```

This should create an exact copy of the .env.example file. Name the newly created file .env and update it with your local environment variables (database connection info and others).

### Generate an app encryption key

```bash
php artisan key:generate
```

### Migrate the database

```bash
php artisan migrate
```

### Run the database seeds

```bash
php artisan db:seed
```

## Postman Collection