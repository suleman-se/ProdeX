---
name: custom-localization-and-translations
description: Guidelines on translating strings in Blade templates and PHP Controllers using the custom translate() function.
---

# Custom Localization & Multi-language Translation Guidelines

ProdeX uses a dynamic, database-backed translation mechanism for localization. Hardcoding UI strings in templates or controllers blocks multi-language storefront capabilities and is a critical development violation.

## 1. Core Rule: Avoid Hardcoded Text
*   **Do NOT** output raw English text strings inside HTML tags or PHP controllers.
*   **DO** wrap all user-visible strings inside the `translate()` helper.

## 2. Using Translations in Blade Templates

In Blade views, always wrap text within `{{ translate('...') }}`:

```html
<!-- INCORRECT -->
<label>Coupon code</label>
<button type="submit">Become a Seller !</button>

<!-- CORRECT -->
<label>{{ translate('Coupon code') }}</label>
<button type="submit">{{ translate('Become a Seller !') }}</button>
```

When rendering text containing HTML elements or formatting, translate the text block first, or translate individual text segments:
```html
<p class="text-muted">{{ translate('By signing up you agree to our') }} <a href="{{ route('terms') }}">{{ translate('Terms & Conditions') }}</a></p>
```

## 3. Using Translations in Controllers and Helpers

In PHP controllers and classes, call the helper directly:

```php
// INCORRECT
flash('No payment history available for this seller')->warning();
return back();

// CORRECT
flash(translate('No payment history available for this seller'))->warning();
return back();
```

## 4. Handling Dynamic Variables in Translations

When text contains dynamic variables (like numbers or names), do not concatenate segments like `translate('Page ') . $page . translate(' of ') . $total`. This breaks grammatical structures in other languages.

*   **DO** use place-holders or replace variables dynamically if required, or translate standard prefixes:

```php
// Concatenation approach (preferred only if the segment remains clean and isolated)
$msg = translate('Product') . ' ' . $product->name . ' ' . translate('has been uploaded successfully.');

// Alternative: translate the template and replace placeholders
$msg = str_replace(':name', $product->name, translate('Product :name has been uploaded successfully.'));
```

## 5. Behind the Scenes: The Translations Schema
*   When `translate('Key Name')` is invoked:
    1.  The system searches the cache or `translations` table for the matching key.
    2.  If it doesn't exist, it dynamically inserts the key into the database so the administrator can translate it from the Admin Translation Settings panel.
    3.  Because of this dynamic generation, **DO NOT** use long, variable, or programmatically generated strings inside the `translate()` helper (e.g. `translate($custom_message)`), as this will pollute the translations database. Only translate static string keys.
