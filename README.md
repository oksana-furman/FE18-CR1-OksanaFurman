
# Recipe Management Platform

This project is a web-based platform that allows users to view, add, update, and delete various recipes. It features user authentication, a stylish interface, and categorized recipe browsing.

## Features

- User registration and login functionality
- Add new recipes with images and descriptions
- Browse recipes by categories
- Edit or delete existing recipes
- Responsive design for enhanced user experience

## Installation

To run this project locally, follow the steps below:

1. **Clone the repository**:
   ```bash
   git clone <repository_url>
   ```
2. **Navigate to the project directory**:
   ```bash
   cd <project_directory>
   ```
3. **Install the required dependencies** (if applicable, e.g., for PHP, or use XAMPP/LAMP stack):
   - Ensure you have PHP installed or use a web server like Apache or Nginx.
   - Set up a MySQL database and import the provided SQL file.

4. **Configure the Database**:
   - Update the database configuration in the `login/connection.php` file with your local credentials.
   ```php
   $servername = "localhost";
   $username = "your_username";
   $password = "your_password";
   $dbname = "your_database_name";
   ```

5. **Run the Project**:
   - Start your local web server (Apache or Nginx) and open the project in your browser.

## Project Structure

- **login/**: Contains all the PHP files related to user authentication, including login, registration, and logout functionalities.
- **img/**: Stores the recipe images used across the website.
- **style/**: Contains SCSS and CSS files responsible for styling the web application.
- **uploads/**: Stores images uploaded by the users when they add new recipes.

## Usage

1. Register or log in to the platform.
2. Browse recipes by category or search for specific ones.
3. Add, edit, or delete your recipes.
4. Enjoy exploring various delicious recipes with detailed descriptions and images.

## Technologies Used

- **Frontend**: HTML, SCSS/CSS
- **Backend**: PHP
- **Database**: MySQL
- **Version Control**: Git

## License

This project is licensed under the MIT License.
