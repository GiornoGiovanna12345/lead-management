# Lead Management System

A web-based Lead Management System built with Laravel, designed to help businesses track and manage potential customers through a structured sales pipeline.

## Features

- **Authentication** — Secure login and logout powered by Laravel Breeze
- **Role Based Access Control** — Admin and Staff roles with different permissions
- **Lead Management** — Create, view, edit, delete and search leads
- **Lead Assignment** — Admin can assign leads to specific staff members
- **User Management** — Admin can create and delete staff accounts
- **Dashboard** — Overview of lead counts by status with recent leads
- **Status Tracking** — Track leads as Pending, Converted or Rejected

## Tech Stack

- **Framework** — Laravel 12
- **Frontend** — Blade Templates, Tailwind CSS
- **Database** — MySQL
- **Authentication** — Laravel Breeze

## Roles

| Role | Permissions |
|---|---|
| Admin | Full access — manage leads, users, assignments |
| Staff | View and track only leads assigned to them |

## Installation

1. Clone the repository
```bash
git clone https://github.com/GiornoGiovanna12345/lead-management.git
cd lead-management
```

2. Install dependencies
```bash
composer install
npm install
```

3. Set up environment
```bash
cp .env.example .env
php artisan key:generate
```

4. Configure your database in `.env`
```env
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

5. Run migrations and seed admin user
```bash
php artisan migrate
php artisan db:seed --class=AdminUserSeeder
```

6. Start the server
```bash
php artisan serve
npm run dev
```

## Default Admin Credentials

| Field | Value |
|---|---|
| Email | admin@admin.com |
| Password | password |

> Change these credentials immediately after first login in a production environment.

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
