# Web--shop


## wirefream : 
https://embed.figma.com/design/Iv3x2dJ4MVuc8DGhVzGZpe/Untitled?node-id=0-1&m=dev&embed-host=share

# Web Shop

A simple web shop application built using PHP, MySQL, and Bootstrap for listing games, complete with pagination and game details pages.

## Features

- List games with pagination
- Game detail pages
- Image upload and display
- Bootstrap for responsive design
- Secure database queries using PDO
- Organized structure for scalability and easy maintenance

## Technologies Used

- **Backend**: PHP, MySQL
- **Frontend**: HTML, CSS, Bootstrap 4.5.2
- **Database**: MySQL
- **JavaScript**: jQuery

## Installation

### Prerequisites

- PHP 7.4 or higher
- MySQL 5.7 or higher
- Composer (optional, if you're using any PHP libraries)
- A web server like Apache or Nginx

### Steps

1. Clone the repository:
    ```bash
    git clone https://github.com/your-username/web-shop.git
    ```

2. Navigate to the project directory:
    ```bash
    cd web-shop
    ```

3. Configure your database in the `config/database.php` file:
    ```php
    $dbConnection = new PDO('mysql:host=localhost;dbname=your_database_name', 'username', 'password');
    ```

4. Import the `games` table SQL file into your database:
    ```bash
    mysql -u username -p your_database_name < games.sql
    ```

5. (Optional) Install any required PHP libraries using Composer:
    ```bash
    composer install
    ```

6. Start your local server (e.g., using PHP's built-in server):
    ```bash
    php -S localhost:8000
    ```

7. Open your browser and visit:
    ```
    http://localhost:8000
    ```

## Project Structure

```bash
.
├── config/             # Database configuration
├── components/         # Game details and other components
├── src/                # Includes (header, footer, navbar, etc.)
├── images/             # Game images
├── css/                # Custom styles
├── games.sql           # Database schema for games
├── index.php           # Main entry point
└── README.md           # Project documentation

