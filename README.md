# Laravel CRM Using Blade

A modern, user-friendly Customer Relationship Management (CRM) system built with Laravel 12 and Blade templates. This project provides a complete solution for managing clients, projects, tasks, and users, with a beautiful UI and robust backend.

## Features

-   **Authentication**: Secure login and registration system.
-   **Dashboard**: Overview of users, clients, projects, and tasks with summary cards.
-   **Client Management**: Add, edit, view, and delete clients. Store company, contact, email, and phone details.
-   **Project Management**: Create, assign, and track projects. Link projects to clients and users, set deadlines, and manage statuses.
-   **Task Management**: Organize tasks by project, client, and user. Track deadlines and statuses.
-   **User Management**: Manage users with CRUD operations.
-   **Responsive UI**: Built with Bootstrap 5 and custom styles for a clean, modern look.
-   **Notifications**: Modal-based feedback for actions (success, error, etc.).
-   **Role-based Access**: (Planned) Extendable for admin/user roles.

## Tech Stack

-   **Backend**: Laravel 12 (PHP 8.2+)
-   **Frontend**: Blade templates, Bootstrap 5, Font Awesome
-   **JS/CSS**: Custom JavaScript, Tailwind CSS (via Vite), custom styles
-   **Database**: MySQL (default, configurable)
-   **Build Tools**: Vite, Laravel Mix

## Directory Structure

-   `app/Models/` — Eloquent models for User, Client, Project, Task
-   `app/Http/Controllers/` — RESTful controllers for each module
-   `resources/views/` — Blade templates for all pages and components
-   `public/` — Public assets (CSS, JS, images)
-   `routes/web.php` — Main web routes
-   `database/migrations/` — Database schema

## Getting Started

### Prerequisites

-   PHP 8.2+
-   Composer
-   Node.js & npm
-   MySQL or compatible database

### Installation

1. **Clone the repository:**
    ```bash
    git clone <your-repo-url>
    cd LaravelCRMUsingblade
    ```
2. **Install PHP dependencies:**
    ```bash
    composer install
    ```
3. **Install JS dependencies:**
    ```bash
    npm install
    ```
4. **Copy and configure environment:**
    ```bash
    cp .env.example .env
    # Edit .env for your DB and mail settings
    ```
5. **Generate app key:**
    ```bash
    php artisan key:generate
    ```
6. **Run migrations:**
    ```bash
    php artisan migrate
    ```
7. **Start the dev server:**
    ```bash
    npm run dev
    php artisan serve
    ```

Visit [http://localhost:8000](http://localhost:8000) to get started.

## Usage

-   Register or log in to access the dashboard.
-   Use the sidebar to navigate between Clients, Projects, Tasks, and Users.
-   Add, edit, or delete records as needed.
-   Dashboard provides a quick overview of your CRM data.

## Customization

-   **Styling:** Modify `public/css/style.css` or use Tailwind classes in Blade files.
-   **JS:** Add custom scripts in `public/js/style.js` or `public/js/custom.js`.
-   **Components:** Reusable Blade components in `resources/views/components/`.

## Contributing

Pull requests are welcome! For major changes, please open an issue first to discuss what you would like to change.

## License

This project is open-sourced under the MIT license.
