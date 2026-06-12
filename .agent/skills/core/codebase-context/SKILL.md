---
name: codebase-context
description: Automatically loaded for ALL ProdeX tasks to map the codebase directories, database settings, global helper structures, MVC organization, and roles.
---

# ProdeX Dropshipping Marketplace — Codebase Map & Architectural Context

This skill serves as the master guide for the architecture, file organization, database settings, and core patterns of the ProdeX project. Refer to this skill when navigating the repository or adding/modifying features.

## 1. Directory Structure Map

ProdeX is structured as a standard Laravel 10 MVC application:

*   **`app/Http/Controllers/`**: Contains core logic.
    *   `Admin/`: Controllers for administrator management (products, categories, users, setup configurations).
    *   `Seller/`: Controllers for seller dashboards and features (shops, products, orders).
    *   `Api/`: RESTful endpoints for the Flutter mobile apps.
    *   `Payment/`: Standardized controllers for global/regional payment gateway integrations (Bkash, Stripe, etc.).
*   **`app/Models/`**: Database tables mapped as Eloquent models (e.g., `Product`, `Order`, `Shop`, `User`, `BusinessSetting`, `Upload`).
*   **`app/Http/Helpers.php`**: Global helper functions autoloaded via Composer (available anywhere in Blade templates and PHP code).
*   **`resources/views/`**: Blade templates.
    *   `backend/`: Dashboard templates for Admin.
    *   `seller/`: Dashboard templates for Sellers.
    *   `frontend/`: The customer-facing storefront pages.
*   **`routes/`**: Routing files.
    *   `web.php`: Standard web routing.
    *   `admin.php`: Admin panel routes protected by admin/permission middleware.
    *   `seller.php`: Seller panel routes protected by seller middleware.
    *   `api.php`: Sanctum/JWT routes for mobile apps.
*   **`public/`**: Assets (CSS, JS, static images, and the `uploads/` folder).

## 2. Key Database Tables & Models

*   **`users` (`App\Models\User`)**: Holds accounts. Core field is `user_type` (can be `admin`, `seller`, `customer`, or `delivery_boy`).
*   **`shops` (`App\Models\Shop`)**: Details about merchant stores (belongs to a Seller user).
*   **`products` (`App\Models\Product`)**: Details of store products. Linked to a seller/admin and categories.
*   **`orders` & `combined_orders`**: Order tracking. ProdeX groups individual orders under a `CombinedOrder` for unified payment checkout.
*   **`uploads` (`App\Models\Upload`)**: Reference table for files uploaded via the AIZ Media Manager.

## 3. Global Configuration & Settings System

ProdeX does not store all settings in configuration files. Instead, it uses a database-driven key-value setup:
*   **Table**: `business_settings`
*   **Model**: `App\Models\BusinessSetting`
*   **Helper**: `get_setting($key, $default_value = null)`
    *   Use this helper to retrieve setup configurations anywhere (e.g., `get_setting('paypal_sandbox')`, `get_setting('system_default_currency')`).
    *   **Do NOT** hardcode configuration values. Use `get_setting()` to retrieve them dynamically.

## 4. Custom Helper Rationale

The file `app/Http/Helpers.php` defines a set of convenience functions. Key helpers to use:
*   **`translate($text)`**: Translates a string to the current selected language.
*   **`uploaded_asset($id)`**: Resolves a file upload ID (from the `uploads` table) into its full asset URL.
*   **`single_price($amount)`**: Formats a raw decimal numeric value into the system's currency format (e.g., `$10.00` or `1,000৳`).
*   **`filter_products($products)`**: Applies global/seller filters on query scopes.

## 5. Development Guidelines

1.  **Strict Middleware Gating**: Always place role-specific routes in the respective route files (`admin.php`, `seller.php`).
2.  **Asset Compilation**: Compiled using Laravel Mix (Webpack). If making changes to files in `resources/js/` or `resources/sass/`, make sure to compile them using `npm run dev` or `npm run production`.
3.  **Eloquent Over Raw SQL**: Always prefer Eloquent ORM relations (defined on Models) for cleaner queries and SQL injection safety.
