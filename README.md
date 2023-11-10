<<<<<<< HEAD
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## 
# Litenote App

## Overview

Welcome to Litenote, a simple yet powerful note-taking application developed as part of the Laravel 9.0 Essential Training course. Litenote is designed to provide users with a seamless and intuitive platform for creating and managing notes, with the added feature of making notes public.

## Features

- **Effortless Note-Taking**: Litenote offers a straightforward and user-friendly interface for creating and managing notes. Capture your thoughts, ideas, and important information with ease.

- **Public Notes**: Stand out with the unique ability to make your notes public. Share your insights and knowledge with the world by allowing others to view selected notes.

- **Laravel 9.0 Integration**: Developed using the latest Laravel 9.0 framework, Litenote leverages the power of Laravel's features for a robust and secure note-taking experience.

## Extra Features Completed

### Make Note Public

Litenote goes beyond basic note-taking by enabling users to make their notes public. This feature allows individuals to share valuable information, tips, or creative content with a wider audience. By choosing to make a note public, users contribute to a collaborative knowledge-sharing environment.

## Technologies Used

- **Laravel 9.0**: The latest version of the popular PHP framework, providing a solid foundation for building modern and scalable web applications.

## Setup Instructions

1. **Clone the Repository**: Clone the project repository to your local machine using the following command:
   ```
   git clone https://github.com/your-username/litenote.git
   ```

2. **Navigate to the Project Directory**: Move to the project directory:
   ```
   cd litenote
   ```

3. **Install Dependencies**: Install the required dependencies using:
   ```
   composer install
   ```

4. **Configure Environment**: Set up your environment variables by copying the `.env.example` file to `.env` and configuring it according to your setup.

5. **Generate Application Key**: Generate the application key:
   ```
   php artisan key:generate
   ```

6. **Run Migrations and Seed Database**: Apply the database migrations and seed the database with sample data:
   ```
   php artisan migrate --seed
   ```

7. **Run the Development Server**: Start the development server:
   ```
   php artisan serve
   ```

8. **Access the App**: Open your web browser and go to [http://localhost:8000/](http://localhost:8000/) to access Litenote.

## Contribution Guidelines

If you wish to contribute to Litenote, follow these guidelines:

1. Fork the repository.
2. Create a new branch for your feature or bug fix.
3. Make your changes and commit them.
4. Push to your fork and submit a pull request.

## Acknowledgments

Litenote is the result of collaborative efforts and contributions. We extend our gratitude to all individuals who have participated in the development of this application.

## License

Litenote is licensed under the [MIT License](LICENSE.md), allowing you to use, modify, and distribute the code in accordance with the terms of the license.
