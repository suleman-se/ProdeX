---
name: aiz-uploader-integration
description: Guidelines for utilizing the custom AIZ Uploader media picker and resolving asset URLs with uploaded_asset().
---

# AIZ Uploader & Media Management Guidelines

ProdeX uses a centralized Media Manager (the AIZ Uploader) to handle all files and images. The uploader handles watermarking, image compression, sizing limits, and storage driver uploads (S3, local, etc.).

## 1. Core Rule: Avoid Standard HTML File Inputs
*   **Do NOT** use generic HTML `<input type="file">` controls in Admin or Seller forms. Doing so bypasses the system's centralized media optimizations and breaks the media picker layout.
*   **DO** use the unified `aizuploader` markup in forms.

## 2. Standard Uploader Form Markup

To integrate the media picker in form fields, use the following layout:

```html
<div class="form-group row">
    <label class="col-md-3 col-form-label" for="logo">
        {{ translate('Package logo') }}
    </label>
    <div class="col-md-9">
        <!-- Input Group with data-toggle="aizuploader" -->
        <div class="input-group" data-toggle="aizuploader" data-type="image" data-multiple="false">
            <div class="input-group-prepend">
                <div class="input-group-text bg-soft-secondary font-weight-medium">
                    {{ translate('Browse') }}
                </div>
            </div>
            <div class="form-control file-amount">{{ translate('Choose File') }}</div>
            <!-- The selected ID(s) will be set dynamically here -->
            <input type="hidden" name="logo" class="selected-files" value="{{ $existing_logo_id }}">
        </div>
        <!-- File preview container (rendered dynamically by Javascript) -->
        <div class="file-preview box sm"></div>
    </div>
</div>
```

### Supported Attributes on the Uploader Container:
*   `data-toggle="aizuploader"`: Registers the element to trigger the uploader modal on click.
*   `data-type`: Restricts file selection. Supported values: `image`, `video`, `audio`, `document`, `archive`.
*   `data-multiple`: Set to `true` to allow multiple file selection, or `false` (default) for single file selection.

## 3. Handling Uploads in Controllers
The uploader returns the primary key ID(s) of the records in the `uploads` table. 
*   **Single File**: Stores a single integer ID (e.g., `12`).
*   **Multiple Files**: Stores a comma-separated list of IDs (e.g., `12,15,18`) as a string in the database column.

## 4. Resolving Image URLs in Views

To render an uploaded asset, pass the ID (or attribute holding the ID) into the `uploaded_asset()` helper function:

```html
<!-- Single Image -->
<img src="{{ uploaded_asset($product->thumbnail) }}" alt="Product Image">

<!-- Display User Avatar with fallback -->
<img src="{{ uploaded_asset(Auth::user()->avatar_original) }}" 
     onerror="this.onerror=null;this.src='{{ static_asset('assets/img/avatar-place.png') }}';">
```

For fields storing multiple files (comma-separated):
```php
@if(!empty($product->photos))
    @foreach(explode(',', $product->photos) as $photo_id)
        <img src="{{ uploaded_asset($photo_id) }}" alt="Gallery Image">
    @endforeach
@endif
```
