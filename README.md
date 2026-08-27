# 🎬 MovieRepo - Cinema Management System

A comprehensive Laravel-based Cinema Management System. This project serves as a full-stack application featuring a Web Admin Dashboard for inventory management and a secure REST API for mobile applications.

## ✨ Features

### 🖥️ Web Dashboard (Blade)
*   **Role-Based Access Control:** Secure authentication system distinguishing between Admins and Regular Users.
*   **Movie Management (CRUD):** Admins can effortlessly add, view, edit, and delete movies.
*   **Media Handling:** Integrated image upload system for movie posters.
*   **AI Chatbot:** Built-in AI chatbot interface for enhanced user interaction.
*   **Responsive UI:** Clean, modern interface styled with custom CSS and structured with Laravel Blade.

### 📱 REST API
*   **Movie Endpoints:** Browse the entire movie catalog or fetch detailed information for specific titles.
*   **Watchlist Management:** Users can add movies to their personal watchlist, view their list, and remove items seamlessly.
*   **API Resources:** Utilizes Laravel API Resources for standardized, clean JSON responses and proper data casting.

---

## 🛠️ Tech Stack

*   **Framework:** Laravel 11
*   **Language:** PHP
*   **Database:** MySQL (Eloquent ORM)
*   **Frontend:** Laravel Blade, HTML5, CSS3, JavaScript
*   **Asset Bundling:** Vite

---

## 🚀 Installation & Setup

Follow these steps to get the project up and running on your local machine.

**1. Clone the repository**
```bash
git clone [https://github.com/Mohamed-said57/Iti-Laravel-Project.git](https://github.com/Mohamed-said57/Iti-Laravel-Project.git)
cd Iti-Laravel-Project
```

**2. Install dependencies**
```bash
composer install
npm install
npm run build
```

**3. Environment Setup**
```bash
cp .env.example .env
```
Open the `.env` file and configure your database credentials:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password
```

**4. Generate Application Key & Run Migrations**
```bash
php artisan key:generate
php artisan migrate
```

**5. Link Storage (For Images)**
```bash
php artisan storage:link
```

**6. Start the Development Server**
```bash
php artisan serve
```
Visit `http://localhost:8000` in your browser.

---

## 📡 API Documentation

Base URL: `http://localhost:8000/api`

| Method | Endpoint | Description |
| :--- | :--- | :--- |
| `GET` | `/movies` | Retrieve a paginated list of all movies. |
| `GET` | `/movies/{id}` | Retrieve details of a specific movie. |
| `GET` | `/watchlist` | Retrieve the authenticated user's watchlist. |
| `POST` | `/watchlist` | Add a movie to the watchlist (Requires `movie_id`). |
| `DELETE` | `/watchlist/{movie_id}` | Remove a specific movie from the watchlist. |
