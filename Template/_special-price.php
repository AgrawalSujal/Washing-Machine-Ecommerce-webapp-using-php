
<?php
    $brand = array_map(function ($pro){ return $pro['item_brand']; }, $product_shuffle);
    $unique = array_unique($brand);
    sort($unique);
    shuffle($product_shuffle);

// request method post
if($_SERVER['REQUEST_METHOD'] == "POST"){
    if (isset($_POST['special_price_submit'])){
        // call method addToCart
        $Cart->addToCart($_POST['user_id'], $_POST['item_id']);
    }
}
if (isset($product)) {
    $in_cart = $Cart->getCartId($product->getData('cart'));
}
?>
<section id="special-price">
    <div class="container">
        <h4 class="font-size-20 font-Roboto">Special Price</h4>
        <div id="filters" class="button-group text-right">
            <button class="btn is-checked" data-filter="">All brands</button>
            <button class="btn" data-filter=".LG">LG</button>
            <button class="btn" data-filter=".Samsung">Samsung</button>
            <button class="btn" data-filter=".Bosch">Bosch</button>
            <button class="btn" data-filter=".EcoBubble">EcoBubble</button>
        </div>

        <div class="grid">
            <?php if (!empty($product_shuffle)) {
                array_map(function ($item) use($in_cart){ ?>
                    <div class="grid-item border <?php echo htmlspecialchars($item['item_brand']); ?>">
                        <div class="item py-2 px-2" style="width: 200px">
                            <div class="item py-2">
                                <div class="product font-rale">
                                    <a href="<?php printf('%s?item_id=%s', 'product.php',  $item['item_id']); ?>">
                                        <img
                                                src="<?php echo htmlspecialchars($item['item_image'] !== null ? $item['item_image'] : './assets/image1.jpeg'); ?>"
                                                alt="<?php echo htmlspecialchars($item['item_name'] !== null ? $item['item_name'] : 'unknown product'); ?>"
                                                class="img-fluid"
                                        />
                                    </a>
                                    <div class="text-center">
                                        <h6><?php echo htmlspecialchars($item['item_name'] !== null ? $item['item_name'] : 'unknown'); ?></h6>
                                        <div class="rating text-warning font-size-12">
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="far fa-star"></i></span>
                                        </div>
                                        <div class="price py-2">
                                            <span><?php echo htmlspecialchars($item['item_price'] !== null ? $item['item_price'] : 'unknown'); ?></span>
                                        </div>
<!--                                        <button type="submit" class="btn btn-warning font-size-12">-->
<!--                                            Add to Cart-->
<!--                                        </button>-->
                                        <form method="post">
                                            <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '1'; ?>">
                                            <input type="hidden" name="user_id" value="<?php echo 1; ?>">
                                            <?php
                                            if (in_array($item['item_id'], $in_cart ?? [])){
                                                echo '<button type="submit" disabled class="btn btn-success font-size-12">In the Cart</button>';
                                            }else{
                                                echo '<button type="submit" name="top_sale_submit" class="btn btn-warning font-size-12">Add to Cart</button>';
                                            }
                                            ?>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }, $product_shuffle);
            } else {
                echo '<p>No products available.</p>';
            } ?>
        </div>
    </div>
</section>
