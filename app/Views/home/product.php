<div class="product-page">
    <div class="product-container">
        <!-- Colonne gauche: Images et info -->
        <div class="product-left">
            <div class="product-image-main">
                <img src="<?= htmlspecialchars($product['image']) ?>" alt="<?= htmlspecialchars($product['titre']) ?>">
            </div>
            
            <div class="product-size-section">
                <div class="size-label">TAILLE</div>
                <div class="size-value">UNIQUE</div>
            </div>
        </div>
        
        <!-- Colonne droite: Prix et actions -->
        <div class="product-right">
            <h1 class="product-title"><?= htmlspecialchars($product['titre']) ?></h1>
            
            <div class="product-price-section">
                <div class="price-value">€<?= number_format($product['prix'], 0, ',', ' ') ?></div>
            </div>
            
            <div class="product-actions">
                <form action="/panier/add" method="POST">
                    <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                    <input type="hidden" name="quantity" value="1">
                    <button type="submit" class="btn-action btn-buy">
                        <span>Acheter (taxe 67%)</span>
                        <span class="btn-price">€<?= number_format($product['prix'] * 1.67, 0, ',', ' ') ?></span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
.product-page {
    background: #fff;
    height: calc(100vh - 140px);
    padding: 10px 20px;
    display: flex;
    align-items: center;
    overflow: hidden;
}

.product-container {
    max-width: 1200px;
    margin: 0 auto;
    display: grid;
    grid-template-columns: 1fr 400px;
    gap: 40px;
    align-items: center;
    width: 100%;
}

/* Colonne gauche */
.product-left {
    display: flex;
    flex-direction: column;
}

.product-image-main {
    width: 100%;
    max-width: 300px;
    margin: 0 auto 10px;
    height: 350px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.product-image-main img {
    max-width: 100%;
    max-height: 100%;
    width: auto;
    height: auto;
    object-fit: contain;
    display: block;
}

.product-title {
    font-size: 24px;
    font-weight: 700;
    line-height: 1.3;
    color: #000;
    margin: 0 0 15px 0;
    padding-bottom: 15px;
    border-bottom: 1px solid #e5e5e5;
}

/* Colonne droite */
.product-right {
    display: flex;
    flex-direction: column;
}

.product-size-section {
    padding: 12px 0;
    border-bottom: 1px solid #e5e5e5;
    text-align: center;
}

.size-label {
    font-size: 11px;
    font-weight: 600;
    color: #000;
    margin-bottom: 5px;
}

.size-value {
    font-size: 13px;
    color: #000;
}

.product-price-section {
    padding: 12px 0;
    border-bottom: 1px solid #e5e5e5;
}

.price-value {
    font-size: 28px;
    font-weight: 600;
    color: #000;
}

.product-actions {
    padding: 15px 0;
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.product-actions form {
    width: 100%;
}

.btn-action {
    width: 100%;
    padding: 14px 20px;
    border: 2px solid #000;
    background: #fff;
    font-size: 15px;
    font-weight: 600;
    cursor: pointer;
    display: flex;
    justify-content: space-between;
    align-items: center;
    transition: all 0.2s;
}

.btn-action:hover {
    background: #f5f5f5;
}

.btn-buy {
    background: #000;
    color: #fff;
}

.btn-buy:hover {
    background: #333;
}

.btn-price {
    font-size: 13px;
}

/* Responsive */
@media (max-width: 968px) {
    .product-container {
        grid-template-columns: 1fr;
        gap: 30px;
    }
}
</style>
