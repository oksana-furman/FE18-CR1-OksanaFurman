
# Recipe Management Platform

This project is a web-based platform that allows users to view, add, update, and delete various recipes. It features user authentication, a stylish interface, and categorized recipe browsing.

## Features

- User registration and login functionality
- As an admin add new recipes with images and descriptions
- Browse recipes by categories
- As an admin edit or delete existing recipes
- Responsive design for enhanced user experience

## Installation

To run this project locally, follow the steps below:

1. **Clone the repository**:
   ```bash
   git clone https://github.com/oksana-furman/FE18-CR1-OksanaFurman.git
   ```
    
2. **Install the required dependencies** (if applicable, e.g., for PHP, or use XAMPP/LAMP stack):
   - Ensure you have PHP installed and use a web server like Apache or Nginx.
   - Set up a MySQL database and import the provided SQL file from folder/database/.

3. **Configure the Database**:
   - Update the database configuration in the `login/connection.php` file with your local credentials.
   ```php
      $hostname = "127.0.0.1"; 
      $username = "root";
      $password = ""; 
      $dbname = "food_blog_2";
   ```

4. **Run the Project**:
   - Start your local web server (Apache or Nginx) and run the project from your local development environment or open it in your browser with the link: http://localhost:3000/components/home.php (the port might vary depending on your server settings).

## Project Structure

- **login/**: Contains all the PHP files related to user authentication, including login, registration, and logout functionalities.
- **img/**: Stores the recipe images used across the website.
- **style/**: Contains SCSS and CSS files responsible for styling the web application.
- **uploads/**: Stores images uploaded by the users when they add new recipes.
- **folder/**: Contains a file with style links, footer and hero files and exported database.
- **components/**: Contains all the files related to displaying and sorting recipes.
- **actions/**: Contains all the PHP files related to the actions to and from the database.

## Usage

1. Register or log in to the platform.
2. Browse recipes by category or search for specific ones.
3. As an admin add, edit, or delete your recipes.
4. Enjoy exploring various delicious recipes with detailed descriptions and images.

## Technologies Used

- **Frontend**: HTML, SCSS/CSS
- **Backend**: PHP
- **Database**: MySQL
- **Version Control**: Git

## License

This project is licensed under the MIT License.
