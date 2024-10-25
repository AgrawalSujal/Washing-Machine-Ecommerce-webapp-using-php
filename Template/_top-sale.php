<?php

if (isset($product)) {
    $product_shuffle = $product->getData();
}
?>
<section id="top-sale">
    <div class="container py-5">
        <h4 class="font-Roboto font-size-20">Top Sale</h4>
        <hr />
        <!-- owl carousel -->
        <div class="owl-carousel owl-theme">
            <?php if (!empty($product_shuffle)) {
                foreach ($product_shuffle as $item) { ?>
                    <div class="item py-2 px-2">
                        <div class="product font-rale">
                            <a href="<?php printf('%s?item_id=%s', 'product.php',  $item['item_id']); ?>">
                                <img
                                        src="<?php echo isset($item['item_image']) ? htmlspecialchars($item['item_image']) : './assets/image1.jpeg'; ?>"
                                        alt="<?php echo htmlspecialchars(isset($item['item_name']) ? $item['item_name'] : 'unknown product'); ?>"
                                        class="img-fluid"
                                />
                            </a>
                            <div class="text-center">
                                <h6><?php echo htmlspecialchars(isset($item['item_name']) ? $item['item_name'] : 'unknown'); ?></h6>
                                <div class="rating text-warning font-size-12">
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="far fa-star"></i></span>
                                </div>
                                <div class="price py-2">
                                    <span><?php echo htmlspecialchars(isset($item['item_price']) ? $item['item_price'] : 'unknown'); ?></span>
                                </div>
<!--                                <button type="submit" class="btn btn-warning font-size-12">-->
<!--                                    Add to Cart-->
<!--                                </button>-->
                                <form method="post">
                                    <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '1'; ?>">
                                    <input type="hidden" name="user_id" value="<?php echo 1; ?>">
                                    <?php
                                    if (isset($Cart)) {
                                        if (in_array($item['item_id'], $Cart->getCartId($product->getData('cart')) ?? [])){
                                            echo '<button type="submit" disabled class="btn btn-success font-size-12">In the Cart</button>';
                                        }else{
                                            echo '<button type="submit" name="top_sale_submit" class="btn btn-warning font-size-12">Add to Cart</button>';
                                        }
                                    }
                                    ?>

                                </form>
                            </div>
                        </div>
                    </div>
                <?php }
            } else {
                echo '<p>No products available.</p>';
            } ?>
        </div>
        <br />
        <hr />
        <br />
    </div>
</section>
<!-- !Top Sale -->
