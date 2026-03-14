# School Management System

A premium Laravel-based school management platform featuring role-based access control, automated student-parent linking, and a sophisticated announcement dispatch system.

## 🚀 Key Features

- **Admin Dashboard**: System-wide statistics and faculty management.
- **Teacher Workspace**: Scoped management of students and parents using Global Eloquent Scopes.
- **Announcement System**: Targeted broadcasts (Teachers, Students, Parents) with background email processing.
- **Elite Lumina UI**: A deep pitch-black "Floating Canvas" aesthetic with Aurora accents, glassmorphism, and premium typography (Plus Jakarta Sans). Restored standard educational terminology for maximum usability.
- **Security**: Strict RBAC middleware and data isolation via the `CreatedByScope` trait.

## 🛠️ Tech Stack

- **Backend**: Laravel 12 (PHP 8.2+)
- **Frontend**: Blade, Tailwind CSS, Alpine.js (Breeze-based)
- **Database**: MySQL
- **Background Tasks**: Laravel Queues (Database driver)
- **Email**: Mailtrap / SMTP

## 📦 Installation

1. **Clone the repository**:
   ```bash
   git clone <repo-url>
   cd school-management
   ```

2. **Install Dependencies**:
   ```bash
   composer install
   npm install && npm run build
   ```

3. **Environment Setup**:
   ```bash
   cp .env.example .env
   # Update DB_DATABASE, DB_USERNAME, DB_PASSWORD in .env
   php artisan key:generate
   ```

4. **Database & Seeding**:
   ```bash
   php artisan migrate --seed
   ```
   *Note: This creates an Admin (`admin@school.com`) and 5 Teachers with password `password`.*

5. **Run Background Worker**:
   ```bash
   php artisan queue:work
   ```

## 🧪 Testing

The project includes a comprehensive test suite (45 tests, 110 assertions) covering RBAC, CRUD operations, and Notification dispatch.

```bash
php artisan test
```

## 📄 License
Open-sourced software under the MIT license.
