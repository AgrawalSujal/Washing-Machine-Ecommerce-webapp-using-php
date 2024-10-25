
<?php
$item_id = $_GET['item_id'] ?? 1;

if (isset($product)) {
    foreach ($product->getData() as $item) :
        if ($item['item_id'] == $item_id) :
            ?>
            <section id="product" class="py-3">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <img src="<?php echo $item['item_image'] ?? './assets/products/1.png'; ?>" alt="product" class="img-fluid">
                            <div class="form-row pt-4 font-size-16 font-Roboto">
                                <div class="col">
                                    <button type="submit" class="btn btn-danger form-control">Proceed to Buy</button>
                                </div>
                                <div class="col">
                                    <?php
                                    if (isset($Cart)) {
                                        $cartItems = $Cart->getCartId($product->getData('cart')) ?? [];
                                        if (in_array($item['item_id'], $cartItems)) {
                                            echo '<button type="submit" disabled class="btn btn-success font-size-16 form-control">In the Cart</button>';
                                        } else {
                                            echo '<button type="submit" name="top_sale_submit" class="btn btn-warning font-size-16 form-control">Add to Cart</button>';
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 py-5">
                            <h5 class="font-Roboto font-size-20"><?php echo $item['item_name'] ?? 'Unknown'; ?></h5>
                            <small>by <?php echo $item['item_brand'] ?? 'Brand'; ?></small>
                            <div class="d-flex">
                                <div class="rating text-warning font-size-12">
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="far fa-star"></i></span>
                                </div>
                                <a href="#" class="px-2 font-rale font-size-14">20,534 ratings | 1000+ answered questions</a>
                            </div>
                            <hr class="m-0">

                            <!-- Product price -->
                            <table class="my-3">
                                <tr class="font-rale font-size-14">
                                    <td>M.R.P:</td>
                                    <td><strike>$162.00</strike></td>
                                </tr>
                                <tr class="font-rale font-size-14">
                                    <td>Deal Price:</td>
                                    <td class="font-size-20 text-danger">$<span><?php echo $item['item_price'] ?? 0; ?></span><small class="text-dark font-size-12">&nbsp;&nbsp;Inclusive of all taxes</small></td>
                                </tr>
                                <tr class="font-rale font-size-14">
                                    <td>You Save:</td>
                                    <td><span class="font-size-16 text-danger">$152.00</span></td>
                                </tr>
                            </table>
                            <!-- End of Product price -->

                            <!-- Policy section -->
                            <div id="policy">
                                <div class="d-flex">
                                    <div class="return text-center mr-5">
                                        <div class="font-size-20 my-2 color-second">
                                            <span class="fas fa-retweet border p-3 rounded-pill"></span>
                                        </div>
                                        <a href="#" class="font-rale font-size-12">10 Days <br> Replacement</a>
                                    </div>
                                    <div class="return text-center mr-5">
                                        <div class="font-size-20 my-2 color-second">
                                            <span class="fas fa-truck  border p-3 rounded-pill"></span>
                                        </div>
                                        <a href="#" class="font-rale font-size-12">Daily Tuition <br>Delivered</a>
                                    </div>
                                    <div class="return text-center mr-5">
                                        <div class="font-size-20 my-2 color-second">
                                            <span class="fas fa-check-double border p-3 rounded-pill"></span>
                                        </div>
                                        <a href="#" class="font-rale font-size-12">1 Year <br>Warranty</a>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <!-- End of Policy section -->

                            <!-- Order details -->
                            <div id="order-details" class="font-rale d-flex flex-column text-dark">
                                <small>Delivery by: Mar 29 - Apr 1</small>
                                <small>Sold by <a href="#">Daily Electronics</a> (4.5 out of 5 | 18,198 ratings)</small>
                                <small><i class="fas fa-map-marker-alt color-primary"></i>&nbsp;&nbsp;Deliver to Customer - 424201</small>
                            </div>
                            <!-- End of Order details -->

                            <!-- Product options -->
                            <div class="row">
                                <div class="col-6">
                                    <!-- Color options -->
                                    <div class="color my-3">
                                        <div class="d-flex justify-content-between">
                                            <h6 class="font-Roboto">Color:</h6>
                                            <div class="p-2 color-yellow-bg rounded-circle"><button class="btn font-size-14"></button></div>
                                            <div class="p-2 color-primary-bg rounded-circle"><button class="btn font-size-14"></button></div>
                                            <div class="p-2 color-second-bg rounded-circle"><button class="btn font-size-14"></button></div>
                                        </div>
                                    </div>
                                    <!-- End of Color options -->
                                </div>
                                <div class="col-6">
                                    <!-- Quantity section -->
                                    <div class="qty d-flex">
                                        <h6 class="font-Roboto">Qty</h6>
                                        <div class="px-4 d-flex font-rale">
                                            <button class="qty-up border bg-light" data-id="pro1"><i class="fas fa-angle-up"></i></button>
                                            <input type="text" data-id="pro1" class="qty_input border px-2 w-50 bg-light" disabled value="1" placeholder="1">
                                            <button data-id="pro1" class="qty-down border bg-light"><i class="fas fa-angle-down"></i></button>
                                        </div>
                                    </div>
                                    <!-- End of Quantity section -->
                                </div>
                            </div>

                            <!-- Size options -->
                            <div class="size my-3">
                                <h6 class="font-Roboto">Size :</h6>
                                <div class="d-flex justify-content-between w-75">
                                    <div class="font-rubik border p-2">
                                        <button class="btn p-0 font-size-14">4GB RAM</button>
                                    </div>
                                    <div class="font-rubik border p-2">
                                        <button class="btn p-0 font-size-14">6GB RAM</button>
                                    </div>
                                    <div class="font-rubik border p-2">
                                        <button class="btn p-0 font-size-14">8GB RAM</button>
                                    </div>
                                </div>
                            </div>
                            <!-- End of Size options -->
                        </div>

                        <div class="col-12">
                            <h5 class="font-rubik"><b>Product Description</b></h5>
                            <hr>
                            <p class="font-rale font-size-14">
                            Discover the perfect blend of efficiency and innovation with our wide range of washing machines. Designed to meet the diverse needs of modern households, our machines promise a superior cleaning experience while being energy-efficient and user-friendly.


                            </p>
                            <p class="font-rale font-size-14">
                                Key Features:

                                - Advanced Cleaning Technology: Our washing machines utilize cutting-edge technology to tackle tough stains and provide a deep clean, ensuring your clothes look and feel fresh.<br>

                                - Variety of Sizes: Whether you have a small apartment or a large family home, we offer machines in various capacities to fit your laundry needs perfectly.<br>

                                - Eco-Friendly Options: Choose from energy-efficient models that help reduce your carbon footprint while saving on utility bills. Enjoy powerful cleaning without compromising the environment.<br>

                                - User-Friendly Controls: Featuring intuitive interfaces and multiple wash cycles, our washing machines make it easy to select the perfect setting for every fabric type, from delicate silks to heavy-duty linens.<br>

                                - Quiet Operation**: Enjoy a peaceful home environment with our machines’ advanced noise-reduction technology, designed to minimize operational sounds.<br>

                                - **Durability and Reliability: Built with high-quality materials, our washing machines are engineered to withstand daily use, ensuring you have a reliable appliance for years to come.

                              <h5><b> Why Choose Us?</b></h5>

                                With a commitment to quality and customer satisfaction, our washing machines are backed by excellent warranties and customer support. Browse our selection today to find the perfect washing machine that fits your lifestyle and budget. Upgrade your laundry experience and enjoy fresh, clean clothes with ease!

                                Shop Now and Transform Your Laundry Routine!

                            </p>
                        </div>
                    </div>
                </div>
            </section>
        <?php
        endif;
    endforeach;
}
?>
