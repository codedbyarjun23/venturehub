# VentureHub

VentureHub is a startup networking and collaboration platform built using Laravel.  
The platform allows users to connect with like-minded people, share startup ideas, collaborate on projects, and participate in events.

---

# Features

## Authentication
- User Registration
- User Login
- Email Verification
- Secure Authentication System

## Networking Feed
- Create Posts
- View Latest Posts
- Comment on Posts
- User Interaction

## Project Collaboration
- Create Projects
- Add Required Skills
- Manage Project Status
- Collaborate with Other Users

## Events Management
- Create Events
- View Upcoming Events
- Event Details and Location

## User Profiles
- View User Profiles
- Explore Network Members

---

# Tech Stack

- PHP
- Laravel
- MySQL
- Blade Templating Engine
- Tailwind CSS
- Vite

---

# Project Structure

```bash
app/
 ├── Models
 ├── Http/Controllers
resources/
 ├── views
routes/
 ├── web.php
database/
 ├── migrations
```

---

# Installation

## Clone Repository

```bash
git clone https://github.com/codedbyarjun/venturehub.git
```

## Move Into Project Folder

```bash
cd venturehub
```

## Install Dependencies

```bash
composer install
npm install
```

## Configure Environment

Copy `.env.example`:

```bash
cp .env.example .env
```

Generate application key:

```bash
php artisan key:generate
```

---

# Database Setup

Update database credentials in `.env`

Run migrations:

```bash
php artisan migrate
```

(Optional)

```bash
php artisan db:seed
```

---

# Run Project

Start Laravel server:

```bash
php artisan serve
```

Start Vite:

```bash
npm run dev
```

Open:

```bash
http://127.0.0.1:8000
```

---

# Main Modules

## Posts
Users can:
- Share startup ideas
- Comment on discussions
- Interact with the community

## Projects
Users can:
- Create collaboration projects
- Add project requirements
- Manage project status

## Events
Users can:
- Organize events
- View upcoming events
- Explore networking opportunities

---

# MVC Architecture

The project follows Laravel MVC Architecture:

- Models → Database Logic
- Views → Frontend UI
- Controllers → Application Logic

---

# Future Improvements

- Real-time Chat
- Notifications
- Team Collaboration System
- Project Applications
- AI Startup Recommendations
- Dark Mode

---

# Author

Developed by Arjun Raj

---

# License

This project is for educational purposes.
