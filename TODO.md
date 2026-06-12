# ProdeX — Future Development TODO

This file tracks all planned changes for later phases of the dropshipping platform transformation.
All items below are deferred and will be addressed in future development cycles.

---

## Phase 2: Dropshipping UX Tuning

### Supplier Registration Enhancement
- [ ] Add "Supplier Type" field (Manufacturer, Wholesaler, Distributor) to registration form
- [ ] Store supplier type in `shops` table (new column or `meta` JSON)
- [ ] Update admin seller approval views to show supplier type

### Supplier Cost Price & Margins
- [ ] **Migration:** Add `supplier_cost_price` column (`DECIMAL(11,2)`, default 0) to `products` table after `unit_price`
- [ ] Update product create/edit forms (backend + seller) to include "Cost Price" field
- [ ] Add calculated margin display `(unit_price - supplier_cost_price)` in admin product list
- [ ] Update `ProductController.php` to save `supplier_cost_price` during create/update

### Admin Dashboard — Margin Widget
- [ ] Add "Profit Margins" summary card to admin dashboard:
  - Total Revenue vs Total Supplier Costs
  - Average Margin %
  - Top 5 most profitable products

### Hide Supplier Info from Customers
- [ ] **Migration:** Add `hide_supplier_info_from_customer` to `business_settings` table
- [ ] Add toggle in Admin → Business Settings
- [ ] Conditionally hide "Sold by [Supplier Name]" on product detail page
- [ ] Show platform name on invoices instead of supplier name
- [ ] Group checkout items under platform brand

---

## Phase 3: Automated Order Forwarding & Notifications

### Supplier Order Notifications
- [ ] Create `App\Notifications\SupplierNewOrderNotification` class
- [ ] Trigger email + database notification to each supplier after `checkout_done()`
- [ ] Include: Order ID, Product details, Shipping address, Quantity
- [ ] Add "New Orders" badge/counter on supplier dashboard

### Tracking Number Sync
- [ ] **Migration:** Add `supplier_tracking_number` column to `order_details` table
- [ ] Add "Mark as Shipped" action with tracking number input in supplier order view
- [ ] Auto-update customer-facing order status when supplier marks shipped
- [ ] Customer notification when tracking number is added

---

## Phase 4: Advanced Dropshipping Features

### Pricing Rules Engine
- [ ] **Migration:** Create `pricing_rules` table:
  ```
  id, type (fixed/percentage/category), value, category_id (nullable), is_active, timestamps
  ```
- [ ] Create `App\Http\Controllers\Admin\PricingRuleController`
- [ ] Admin UI for managing pricing rules
- [ ] Auto-calculate `unit_price` from `supplier_cost_price` + markup rule
- [ ] Support: Fixed amount, Percentage, Category-based markup rules

### Supplier Performance Dashboard
- [ ] Create Admin → Supplier Performance page
- [ ] Track per-supplier metrics:
  - Order fulfillment rate
  - Average shipping time
  - Return/refund rate
  - Customer rating

### White-Label / Branded Invoicing
- [ ] Update `InvoiceController.php` when `hide_supplier_info_from_customer` is enabled:
  - Show "ProdeX" as the seller on invoices
  - Omit supplier details
  - Use platform logo

---

## Flutter / Mobile API Updates (Later Stage)

- [ ] Update API routes in `routes/api.php` — rename "seller" references in response JSON keys to "supplier"
- [ ] Update `routes/api_seller.php` response payloads to use "supplier" terminology
- [ ] Update Flutter app models/services to match new API key names
- [ ] Test mobile app with updated API responses
- [ ] Ensure backward compatibility with API versioning

---

## Commission Model Review (Later Stage)

- [ ] Review and potentially customize the existing commission system for dropshipping:
  - Fixed rate commission
  - Supplier-based commission (per-supplier percentage)
  - Category-based commission
- [ ] Consider adding:
  - [ ] Tiered commission (volume-based discounts for high-performing suppliers)
  - [ ] Product-level commission override
  - [ ] Commission dashboard for suppliers to see their earnings breakdown

---

## Consolidated Migration (For Future Phases)

When implementing Phases 2-4, create a **single consolidated migration file** that covers all schema changes:

```php
// database/migrations/xxxx_xx_xx_prodex_dropshipping_schema.php
Schema::table('products', function (Blueprint $table) {
    $table->decimal('supplier_cost_price', 11, 2)->default(0)->after('unit_price');
});

Schema::table('order_details', function (Blueprint $table) {
    $table->string('supplier_tracking_number')->nullable()->after('tracking_code');
});

Schema::create('pricing_rules', function (Blueprint $table) {
    $table->id();
    $table->enum('type', ['fixed', 'percentage', 'category']);
    $table->decimal('value', 11, 2);
    $table->foreignId('category_id')->nullable()->constrained()->onDelete('cascade');
    $table->boolean('is_active')->default(true);
    $table->timestamps();
});
```

---

> **Last Updated:** 2026-06-10
> **Status:** Phase 1 Complete (Branding). Phases 2-4 pending.
