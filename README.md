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
- **Admin:** Manages users, locations, plants, schedules, and tips. Access to admin dashboard.
- **User:** Views plants, schedules, tips, and creates/manages personal care reports. Access to user dashboard.

### Core Modules
- **Authentication:** Secure login/register system.
- **Plants Management:** CRUD for plant records.
- **Schedules:** Manage and track plant care activities.
- **Tips:** Knowledge base for plant care advice.
- **Reports (Laporan):** User-submitted reports on plant status/care.
- **Location Management:** Organization of plant locations.

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
