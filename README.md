# Project Management Platform

## Overview

Welcome to our Project Management Platform, a robust and user-friendly system designed to streamline project and task management. This platform is built using the Laravel framework, in a backend and html , css , javascript , bootstrapp5 in a front end adhering to MVC architecture principles.

## Business Details

### Features

- **User Authentication:** Secure registration, login, and password recovery.
- **Project Management:** Create, edit, and delete projects with detailed information.
- **Task Management:** Efficiently manage tasks associated with each project.
- **Account Settings:** Customize user preferences and security settings.

### Multilingual Support

This platform supports multiple languages, catering to a diverse user base. Currently, it is available in both English and Arabic.

### Getting Started

## Prerequisites

Before you begin, make sure you have the following installed:

- [Git](https://git-scm.com/)
- [Composer](https://getcomposer.org/)
- [PHP](https://www.php.net/) (Version 8.1 or higher)

Follow these steps to set up the project locally:

1. **Clone the repository:**
    ```bash
    git clone https://github.com/munthir100/LaravelProjectManagement.git
    cd LaravelProjectManagement
    ```

2. **Install Dependencies:**
    ```bash
    composer install
    ```

3. **Create a .env file:**
    ```bash
    cp .env.example .env
    ```

4. **Generate Application Key:**
    ```bash
    php artisan key:generate
    ```

5. **Configure Database:**
    - Update the `.env` file with your database details.
    - Run migrations and seed the database:
      ```bash
      php artisan migrate --seed
      ```

6. **Serve the Application:**
    ```bash
    php artisan serve
    ```

7. **Access the Platform:**
    Visit [http://localhost:8000](http://localhost:8000) in your web browser.

### Contributing

We welcome contributions! If you find any issues or have suggestions for improvements, feel free to submit a pull request.

### Support and Contact

For any inquiries or support, please contact our team at support@projectmanagement.com.

## License

This project is licensed under the [MIT License](LICENSE).
