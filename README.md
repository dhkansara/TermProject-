# TechZone – Online Computer Store

## Project Description
TechZone is an online computer store built with PHP and MySQL.  
It allows users to browse products, add items to a cart, create an account, place orders, and see an order confirmation.  
An admin panel is provided to manage products, view customer orders, and manage user accounts.

## Technologies Used
- PHP (with PDO)
- MySQL (XAMPP / phpMyAdmin)
- HTML5, CSS3, Bootstrap 5
- JavaScript (basic)
- Font Awesome icons

## Features

### User Side
- Responsive homepage with hero banner.
- Product listing page with cards and prices.
- Single product view page.
- Shopping cart using PHP sessions (add/remove/update quantities).
- Checkout form with basic payment (stores only last 4 card digits).
- User registration (signup) with hashed passwords.
- User login/logout with session.
- Logged-in user’s name shown in navbar with dropdown + “My Orders” (if added).
- Order placement storing data in `orders`, `order_items`, `payments`, and `customers`.

### Admin Side
- Admin login with secure hashed password.
- Admin dashboard.
- Manage products: list, add, edit, delete.
- View customer orders (joined with customer info).
- View/manage user accounts (customers list).

## Database

Main tables:
- `customers`
- `products`
- `orders`
- `order_items`
- `payments`
- `admins`

SQL for creating and populating the database is in:  
`/sql/techzone.sql`

## Setup Instructions

1. Clone the repository:
   ```bash
   git clone https://github.com/YOUR-USERNAME/YOUR-REPO-NAME.git
