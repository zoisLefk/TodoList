# Laravel Todo Application

This is a simple Todo List application built with Laravel.
Users can register or log in, create Projects and add Tasks on the project.

# Requirements

- PHP >= 8.x
- Composer
- Laravel >= 10
- Node.js & npm (for frontend)

# Installation & Setup

1. Clone the repository
```bash
git clone https://github.com/zoisLefk/TodoList.git
cd TodoList
```
2. Install PHP Dependencies
```bash
composer Install
```
3. Install Frontend Dependencies
```bash
npm Install
npm run dev
```
4. Create the Environment File
```bash
cp .env.example .env
```
5. Generate Application Key
```bash
php artisan key:generate
```
6. Run Migrations
```bash
php artisan migrate
```
7. Start the development Server
```bash
php artisan serve
```
The application run on:
```
http://127.0.0.1:8000
```

# How to use

1. Register or Log In
* Create new account or log in if you have one
2. Create Project
* Go to dashboard
* Click "Create New" next to projects
* press "Create"
3. Add Task
* Click "Project Preview"
* Click Add Task
* press "Add"
4. Mange Tasks
* Mark a task as completed or uncompletd
* Edit or delete a task
5. Manage projects
* Edit or delete a project