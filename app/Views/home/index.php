<!-- Main Content -->
<div class="main-content">
    <!-- Products Carousel Section -->
    <section class="products-carousel-section">
    
    <div class="products-carousel">
        <?php foreach ($products as $product): ?>
        <!-- Product <?= htmlspecialchars($product['id']) ?> -->
        <a aria-label="<?= htmlspecialchars($product['titre']) ?>" href="/produit/<?= $product['id'] ?>" class="product-carousel-item">
            <div class="product-info">
                <div class="product-name-year">
                    <div class="product-name" data-qa="grid_cell_product_name"><?= htmlspecialchars($product['titre']) ?></div>
                    <div class="product-year" data-qa="grid_cell_product_release_date"></div>
                </div>
                <div class="product-price-wrapper">
                    <div class="product-price" data-qa="grid_cell_product_price">
                        <span class="price-amount">€<?= number_format($product['prix'], 0, ',', ' ') ?></span>
                    </div>
                </div>
            </div>
            <div class="product-carousel-image">
                <img alt="<?= htmlspecialchars($product['titre']) ?>" 
                     data-qa="grid_cell_product_image" 
                     sizes="(min-width: 768px) calc(18.75vw - 48px), calc(50vw - 48px)" 
                     class="product-image" 
                     src="<?= htmlspecialchars($product['image']) ?>" 
                     srcset="<?= htmlspecialchars($product['image']) ?> 750w" />
            </div>
        </a>
        <?php endforeach; ?>


    </div>
</section>
</div>


