
Project Tree - My Key Folders & Files
```bash
                minishop/
                ├── app/
                │   ├── Http/
                │   │   ├── Controllers/
                │   │   │   ├── Admin/          # Admin CRUD: products, users, orders
                │   │   │   ├── Auth/           # Login/Register controllers (Breeze)
                │   │   │   └── Shop/           # Customer shop/cart/checkout
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
