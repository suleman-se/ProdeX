---
name: project-identity
description: Load automatically for ALL ProdeX development tasks to understand project philosophy, global rules, and AI assistant standards. This is the source of truth for the project identity.
---

# ProdeX Dropshipping Marketplace — Project Identity & Global Standards

This skill defines the high-level philosophy, core rules, and standards for the ProdeX dropshipping marketplace project.

## 1. Project Philosophy
- **Dropshipping Marketplace:** A commission-based marketplace where Suppliers register, list products, and fulfill orders. The platform owner (Admin) takes a commission on each sale.
- **Incremental Stability:** Focus on maintaining stability while adding new features or payment integrations.
- **Modularity:** Utilize Laravel's service-oriented architecture (Controllers, Models, Helpers) to keep logic organized.

## 2. Core Identity
- **ProdeX:** A dropshipping marketplace built on **PHP (Laravel 10)** and **MySQL**, forked from Active eCommerce CMS.
- **Key Roles:**
  1. **Admin:** Platform management, configuration, supplier approvals, commission management, and analytics.
  2. **Supplier:** (internally called "seller" in code) Store management, product listings, order fulfillment, and earnings tracking.
  3. **Customer:** Browsing, purchasing, digital/physical products, auctions, and pre-orders.
  4. **Delivery Boy:** Order tracking and delivery management.
- **Terminology Rule:** In all user-facing UI, the word "Seller" is remapped to "Supplier" via the translation system. Internal code (variable names, route names, table columns) retains the original "seller" naming for backward compatibility.

## 3. Global Technical Hard Rules (REQUIRED)
- **Framework:** **Laravel 10** with PHP 8.2+.
- **Package Manager:** **Composer** for PHP, **npm/yarn** for frontend assets.
- **Frontend Stack:** 
    - **Blade Templates** for server-side rendering.
    - **Vue 2** for interactive components.
    - **Bootstrap 4** and **jQuery** for styling and DOM manipulation.
    - **Laravel Mix** for asset compilation (Webpack).
- **Database:** **MySQL** using Eloquent ORM. Follow Laravel migration standards.
- **Code Standards:** Follow **PSR-12** for PHP. Use descriptive method and variable names.
- **Validation:** ALWAYS validate user input using Laravel's `Validator` or `Request` classes.

## 4. AI Assistant Standards (How to Work)
- **Concise & Actionable:** Skip pleasantries; get to the code and solution.
- **Show, Don't Tell:** Provide code examples rather than long theoretical explanations.
- **Context Aware:** Respect the existing project structure (Controllers in `app/Http/Controllers`, Models in `app/Models`).
- **Safety First:** Proactively warn about breaking changes in database schema or complex payment gateway integrations.
- **Terminology:** Always use "Supplier" in user-facing text (via `translate()`), but keep internal code identifiers as "seller" for compatibility.

## 5. Security Principles
- **Environment Variables:** No hardcoded secrets; use `.env`.
- **Sanitization:** Use Laravel's built-in protection against CSRF, XSS, and SQL injection.
- **Role Gating:** Ensure sensitive routes are protected by appropriate middleware (e.g., `admin`, `seller`, `auth`).

## 6. Project Architecture Details
- **Controllers:** Organized by role/function (e.g., `Admin/`, `Seller/`, `Api/`).
- **Models:** Located in `app/Models`. Use Eloquent relationships extensively.
- **Helpers:** Global helper functions are located in `app/Http/Helpers.php` and auto-loaded via Composer.
- **Uploads:** Managed via `Upload` model and `AizUploadController`.
- **Translations:** Multi-language support via `Translation` and `AppTranslation` models. The `translate()` helper auto-generates missing keys and supports DB-driven value overrides.

## 7. Integration Guidelines
- **Payment Gateways:** Standardized integration for Stripe, PayPal, Razorpay, etc. Follow existing patterns in `CheckoutController` and `PaymentController`.
- **API:** RESTful API for mobile apps (Flutter) located in `routes/api.php` and handled by `Api/` controllers.
- **AI Integration:** Utilize `AIController` and `AiPrompt` for AI-powered features.
