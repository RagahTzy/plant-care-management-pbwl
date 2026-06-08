# Plant Care Management

A Laravel-based application for managing plant care schedules, tips, and reporting.

## Tech Stack
- **Framework:** Laravel 13
- **Language:** PHP 8.4+
- **Database:** PostgreSQL (via Supabase)
- **Frontend:** Blade, Tailwind CSS, AlpineJS
- **Build Tool:** Vite
- **Authentication:** Laravel Breeze

## Features

### Role-Based Access
- **Admin:** Full access to manage the system and monitor data.
- **User:** Restricted access focused on personal plant care and reporting.

### Admin Features
- **Dashboard:** View overall statistics (total plants, schedules, tips, new reports) and latest reports.
- **User Management:** Create, Read, Update, Delete (CRUD) user accounts.
- **Plant Management:** CRUD for plant records.
- **Schedule Management:** CRUD for plant care schedules.
- **Tips Management:** CRUD for plant care tips.
- **Location Management:** CRUD for plant locations.

### User Features
- **Dashboard:** View personal statistics (active plants, today's tasks, report count) and recent plant updates.
- **Plant Viewing:** Browse plant information.
- **Schedule Viewing:** View personal plant care schedules and mark tasks as done.
- **Tips Viewing:** Access plant care knowledge base.
- **Report Management:** Create new care reports and manage personal reports (view, edit, delete).
- **Profile Management:** Update profile information and password.

## Directory Structure
- `app/`: Controllers, Models, Middleware.
- `database/`: Migrations and Seeders.
- `resources/`: Blade views, CSS, JS.
- `routes/`: Application routes (`web.php`, `auth.php`).
- `config/`: Application configuration.

## Setup Instructions

### Prerequisites
- PHP 8.4+
- Composer
- Node.js & NPM
- Supabase project credentials

### Installation
1. Clone the repository.
2. Copy `.env.example` to `.env`.
3. Configure database and storage settings in `.env`.
4. Run:
   ```bash
   composer install
   php artisan key:generate
   php artisan migrate --seed
   npm install
   npm run build
   ```
5. Serve the application:
   ```bash
   php artisan serve
   ```
