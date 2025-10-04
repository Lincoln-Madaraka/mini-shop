
Project Tree - My Key Folders & Files
```bash
                minishop/
                ├── app/
                │   ├── Http/
                │   │   ├── Controllers/
                │   │   │   ├── Admin/          # Admin CRUD: products, users, orders
                │   │   │   ├── Auth/           # Login/Register controllers (Breeze)
                │   │   │   └── Shop/           # Customer shop/cart/checkout files 
                │   │   │       ├── CartController.php       # Add/remove items from session cart
                │   │   │       ├── CheckoutController.php   # Handles checkout, order creation
                │   │   │       ├── OrderController.php      # Customer order view/API
                │   │   │       └── ProductController.php    # Product listing/detail/API
                │   │   ├── Middleware/         # Role-based auth (Admin vs Customer)
                │   │   └── Requests/           # FormRequests for validation
                │   ├── Models/
                │   │   ├── User.php             # Users table & roles
                │   │   ├── Role.php             # Role constants/logic
                │   │   ├── Product.php          # Products table & stock logic
                │   │   ├── Order.php            # Orders table
                │   │   └── OrderItem.php        # OrderItems table
                ├── database/
                │   ├── migrations/             # Tables: users, products, orders, order_items
                │   └── seeders/                # Demo users and sample products
                ├── resources/views/
                │   ├── admin/                  # Admin panel Blade templates (CRUD pages)
                │   ├── auth/                   # Auth pages (login, register)
                │   ├── shop/                   # Customer catalog, cart, checkout pages
                │   └── layouts/                # App & guest layouts, navigation
                ├── routes/
                │   ├── web.php                 # Web routes for Blade pages
                │   └── api.php                 # API routes: GET /api/products, POST /api/orders
                ├── public/
                │   └── index.php               # Entry point
                ├── artisan                     # CLI tool
                ├── composer.json               # PHP dependencies
                ├── tailwind.config.js          # Tailwind optional styling
                └── README.md
                ```

# Mini Shop Lite

**Laravel FullStack Internship Assessment — Red Giant**

A minimal e-commerce skeleton built with **Laravel 10/11** demonstrating full■stack capabilities: authentication, authorization, database modeling, REST APIs, and Blade UI. Admin manages products, customers browse, add to cart, and checkout.

---

## Table of Contents
1. [Project Context](#project-context)  
2. [Tech Stack](#tech-stack)  
3. [Features](#features)  
4. [Setup & Installation](#setup--installation)  
5. [Demo Users & Sample Data](#demo-users--sample-data)  
6. [API Endpoints](#api-endpoints)  
7. [Database Schema](#database-schema)  
8. [SQL Mini-Test](#sql-mini-test)  
9. [Usage / Screenshots](#usage--screenshots)  
10. [Optional Enhancements](#optional-enhancements)  

## Project Context
Mini Shop Lite is a compact Laravel app designed to test **full■stack skills**:
- **Admin:** CRUD for products  
- **Customer:** Browse products, manage cart, checkout creating orders  
- **API:** Public product list and authenticated order creation  
- **Validation & Authorization:** Using Form Requests & Policies  

---
```
## Tech Stack
- **Backend:** Laravel 10/11, Eloquent ORM, Laravel Breeze  
- **Frontend:** Blade, Tailwind CSS 
- **Database:** MySQL / MariaDB  
- **API Testing:** Postman / Insomnia  

---

## Features

### Admin
- List, create, edit, delete products  
- Server-side validation for product fields  
- Role-based access via Policies / Middleware  

### Customer
- Browse product catalog & view details  
- Add/remove items in session-based cart  
- Checkout creates Order + OrderItems, reduces stock  
- Simple order summary page  

### API
- `GET /api/products` → returns all products (public)  
- `POST /api/orders` → create order (authenticated)  
  ```json
  {
    "items": [
      { "product_id": 1, "qty": 2 },
      { "product_id": 5, "qty": 1 }
    ]
  }
Returns created order JSON with totals.

Setup & Installation
Clone the repo:

bash
Copy code
git clone https://github.com/Lincoln-Madaraka/mini-shop-lite.git
cd mini-shop-lite
Install dependencies:

```bash
Copy code
composer install
npm install
npm run dev
Configure environment:
```

```bash
Copy code
cp .env.example .env
php artisan key:generate
Update .env with your DB credentials
```

### Migrate and seed the database:

```bash
php artisan migrate:fresh --seed
Serve the application:
```
```bash
php artisan serve
Demo Users & Sample Data
Role	Email	Password
Admin	admin@demo.com	password
Customer	customer@demo.com	password
```
Sample products included for quick testing.

Database Schema
users: id, name, email, password, role (admin/customer)

products: id, name, price, stock, description

orders: id, user_id, total, created_at

order_items: id, order_id, product_id, qty, unit_price, line_total

SQL Mini-Test
Top 5 best-selling products by quantity

sql
SELECT p.name, SUM(oi.qty) AS total_qty
FROM order_items oi
JOIN products p ON oi.product_id = p.id
GROUP BY p.name
ORDER BY total_qty DESC
LIMIT 5;
Total revenue per day (last 7 days)

sql
SELECT DATE(o.created_at) AS order_date,
       COALESCE(SUM(o.total), 0) AS revenue
FROM orders o
WHERE o.created_at >= CURDATE() - INTERVAL 7 DAY
GROUP BY order_date
ORDER BY order_date;
Per customer: number of orders and lifetime spend

sql
SELECT u.name, COUNT(o.id) AS orders_count, COALESCE(SUM(o.total),0) AS lifetime_spend
FROM users u
LEFT JOIN orders o ON u.id = o.user_id
GROUP BY u.name;
Screenshots of queries/results should be included in a /screenshots folder.

Usage / Screenshots
Admin dashboard: product CRUD

Customer catalog & cart

Checkout flow

API demo in Postman


