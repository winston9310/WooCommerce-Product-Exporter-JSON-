# WooCommerce Product Exporter (JSON)

A WordPress snippet to export all WooCommerce products in JSON format. The script enables administrators to download a `products.json` file containing product details such as ID, name, price, SKU, description, stock, categories, tags, and image URLs.

## Features

- Exports all WooCommerce products in a single JSON file.
- Includes essential product details:
  - Product ID
  - Name
  - Price
  - SKU
  - Description
  - Stock quantity
  - Categories
  - Tags
  - Product image URL
- Restricted access to administrators only for security.

## Installation

1. Add the provided PHP snippet to your WordPress theme's `functions.php` file or create a custom plugin.
2. Ensure you have WooCommerce installed and active on your WordPress site.

## Usage

To export products, visit your website with the following URL while logged in as an administrator:
https://yourwebsite.com/?export_products=json

This will trigger a download of a file named `products.json`.

## JSON Format Example

The exported JSON file will look like this:

```json
[
    {
        "id": 1,
        "name": "Sample Product",
        "price": "29.99",
        "sku": "SKU123",
        "description": "This is a sample product description.",
        "stock": 10,
        "categories": ["Category 1", "Category 2"],
        "tags": ["Tag 1", "Tag 2"],
        "image": "https://yourwebsite.com/wp-content/uploads/2024/01/sample.jpg"
    }
]
