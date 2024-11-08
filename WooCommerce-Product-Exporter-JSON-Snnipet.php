add_action('init', 'export_products_json');

function export_products_json() {
    // Check if the export is requested and if the user has Permissions
    if (isset($_GET['export_products']) && $_GET['export_products'] == 'json' && current_user_can('manage_options')) {
        header('Content-Type: application/json');
        header('Content-Disposition: attachment; filename="products.json"');

        $args = array(
            'post_type' => 'product',
            'posts_per_page' => -1,
        );

        $products = new WP_Query($args);
        $data = array();

        while ($products->have_posts()) {
            $products->the_post();
            $product = wc_get_product(get_the_ID());
            $data[] = array(
                'id' => $product->get_id(),
                'name' => $product->get_name(),
                'price' => $product->get_price(),
                'sku' => $product->get_sku(),
                'description' => $product->get_description(),
                'stock' => $product->get_stock_quantity(),
                'categories' => wp_get_post_terms($product->get_id(), 'product_cat', array('fields' => 'names')),
                'tags' => wp_get_post_terms($product->get_id(), 'product_tag', array('fields' => 'names')),
                'image' => wp_get_attachment_url($product->get_image_id()),
                // Add as many fields as necessary 
            );
        }

        wp_reset_postdata();
        echo json_encode($data, JSON_PRETTY_PRINT);
        exit;
    }
}
