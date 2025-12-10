<link rel="stylesheet" href="../assets/css/featuredProducts.css">

<section class="featured-products py-5">
    <div class="container">
        <h2 class="text-center mb-4" style="color: #2c3e50; text-transform: uppercase;">Featured Products</h2>
        <div class="row g-3 g-md-4">
            <?php
                $products = [
                    ['name' => 'Name of Product', 'img' => '../assets/featured/1.jpg'],
                    ['name' => 'Name of Product', 'img' => '../assets/featured/2.jpg'],
                    ['name' => 'Name of Product', 'img' => '../assets/featured/3.jpg'],
                    ['name' => 'Name of Product', 'img' => '../assets/featured/4.jpg'],
                    ['name' => 'Name of Product', 'img' => '../assets/featured/5.jpg'],
                    ['name' => 'Name of Product', 'img' => '../assets/featured/6.jpg'],
                ];
                foreach ($products as $product) {
                    echo '
                        <div class="col-6 col-md-4 col-lg-3">
                            <div class="card h-100">
                                <img src="' . htmlspecialchars($product['img'], ENT_QUOTES, "UTF-8") . '" alt="' . htmlspecialchars($product['name'], ENT_QUOTES, "UTF-8") . '" class="card-img-top product-thumb">
                                <div class="card-body d-flex align-items-center justify-content-center">
                                    <h6 class="card-title text-center">' . htmlspecialchars($product['name'], ENT_QUOTES, "UTF-8") . '</h6>
                                </div>
                            </div>
                        </div>
                    ';
                }
            ?>
        </div>
    </div>
</section>
