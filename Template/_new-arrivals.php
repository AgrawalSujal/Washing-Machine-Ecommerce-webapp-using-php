<?php
// Ensure $product is set and contains data
if (isset($product)) {
    $product_shuffle = $product->getData();
}

// Check if $product_shuffle is an array
if (is_array($product_shuffle) && !empty($product_shuffle)) {
    shuffle($product_shuffle);
} else {
    // Handle the case when there are no products
    $product_shuffle = []; // Initialize as an empty array to avoid further errors
}
?>

<section id="new-arrivals">
    <div class="container">
        <h4 class="font-size-20">New Arrivals</h4>
        <hr />
        <div class="owl-carousel owl-theme">
            <?php if (!empty($product_shuffle)) {
                foreach ($product_shuffle as $item) { ?>
                    <div class="item py-2 px-2 bg-light">
                        <div class="product font-rale">
                            <a href="<?php printf('%s?item_id=%s', 'product.php', $item['item_id']); ?>">
                                <img
                                        src="<?php echo htmlspecialchars($item['item_image'] ?? './assets/image1.jpeg'); ?>"
                                        alt="<?php echo htmlspecialchars($item['item_name'] ?? 'unknown product'); ?>"
                                        class="img-fluid"
                                />
                            </a>
                            <div class="text-center">
                                <h6><?php echo htmlspecialchars($item['item_name'] ?? 'unknown'); ?></h6>
                                <div class="rating text-warning font-size-12">
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="far fa-star"></i></span>
                                </div>
                                <div class="price py-2">
                                    <span><?php echo htmlspecialchars($item['item_price'] ?? 'unknown'); ?></span>
                                </div>
                                <form method="POST">
                                    <input type="hidden" name="user_id" value="<?php if (isset($user_id)) {
                                        echo htmlspecialchars($user_id);
                                    } ?>" />
                                    <input type="hidden" name="item_id" value="<?php echo htmlspecialchars($item['item_id']); ?>" />
                                    <button type="submit" name="new_phones_submit" class="btn btn-warning font-size-12">
                                        Add to Cart
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php }
            } else {
                echo '<p>No new arrivals available.</p>';
            } ?>
        </div>
    </div>
</section>
<!-- new-arrivals -->
