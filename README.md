# LootMarket

LootMarket is a Laravel-based e-commerce web application designed for gaming products, digital items, game skins, gift cards, gaming equipment, and setup accessories.

The project includes both a customer-facing marketplace and a role-protected administration panel. It supports product management, shopping cart operations, checkout, order management, stock control, wishlists, support messages, and product rarity information.

## Main Features

### Customer Features

* User registration, login, logout, and account settings
* Product listing and product detail pages
* Product search, category filtering, price filtering, and sorting
* Wishlist management
* Session-based shopping cart
* Dynamic cart quantity and total in the navbar
* Stock-aware quantity controls
* International phone code selection
* Checkout with billing and delivery information
* Shipping and payment method selection
* Customer order history
* Detailed order confirmation page
* Support messaging system
* Product rarity system for game skins
* Related product recommendations
* Out-of-stock warnings and disabled purchasing controls
* Responsive interface for desktop, tablet, and mobile devices

### Admin Features

* Role-protected administration panel
* Dashboard statistics
* Total product, user, order, and revenue information
* Monthly revenue chart
* Low-stock and out-of-stock product monitoring
* Latest order overview
* Product creation, editing, and deletion
* Product rarity management
* Category management
* User management
* Order status management
* Order filtering by status
* Customer delivery and payment information
* Support message management and admin replies
* Automatic stock restoration when an order is cancelled
* Automatic stock reduction when a cancelled order is reactivated

## Technologies

* PHP
* Laravel
* Blade
* MySQL
* HTML5
* CSS3
* JavaScript
* Chart.js
* Font Awesome
* Laravel Breeze authentication
* Git and GitHub

## Project Requirements

Before running the project, install:

* PHP
* Composer
* Node.js and npm
* MySQL
* XAMPP or another local server environment

## Installation

Clone the repository:

```bash
https://github.com/eylulyukruk/lootmarket
```

Open the project directory:

```bash
cd ecommerce
```

Install PHP dependencies:

```bash
composer install
```

Install frontend dependencies:

```bash
npm install
```

Create the environment file:

```bash
copy .env.example .env
```

For macOS or Linux:

```bash
cp .env.example .env
```

Generate the application key:

```bash
php artisan key:generate
```

## Database Setup

Create a MySQL database named:

```text
ecommerce
```

Update the database configuration in the `.env` file:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ecommerce
DB_USERNAME=root
DB_PASSWORD=
```

Run the migrations:

```bash
php artisan migrate
```

Create the storage link:

```bash
php artisan storage:link
```

## Running the Project

Start Apache and MySQL from XAMPP.

Start the Laravel development server:

```bash
php artisan serve
```

In a second terminal, start Vite:

```bash
npm run dev
```

Open the application:

```text
http://127.0.0.1:8000
```

Admin panel:

```text
http://127.0.0.1:8000/admin
```

## Admin Access

Create a normal user account from the registration page.

Then open the `users` table in phpMyAdmin and change the user's `role` value to:

```text
admin
```

Do not publish a real personal password in this repository.

## Stock Management

Product stock is reduced automatically after a successful order.

When an administrator changes an order status to `Cancelled`, the purchased quantities are restored to the related products. The system prevents the same cancelled order from restoring stock more than once.

If a cancelled order is moved back to an active status, the system checks the available stock before reducing it again.

## Payment Notice

The checkout page is a demonstration payment interface.

No real payment is processed, and sensitive card information is not stored in the database.

## Author

Eylül Yükrük
20222022388
Software Engineering Student

## Repository

Replace the following address with the actual GitHub repository link:

```text
https://github.com/eylulyukruk/lootmarket
```

