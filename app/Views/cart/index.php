<div class="cart-page">
    <div class="cart-container">
        <h1>Mon Panier</h1>

        <?php if (isset($success)): ?>
            <div class="alert alert-success">
                <?= htmlspecialchars($success) ?>
            </div>
        <?php endif; ?>

        <?php if (isset($error)): ?>
            <div class="alert alert-error">
                <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>

        <?php if (empty($cartItems)): ?>
            <div class="empty-cart">
                <p>Votre panier est vide</p>
                <a href="/" class="btn btn-primary">Continuer vos achats</a>
            </div>
        <?php else: ?>
            <div class="cart-items">
                <?php foreach ($cartItems as $item): ?>
                    <div class="cart-item">
                        <img src="<?= htmlspecialchars($item['image']) ?>" alt="<?= htmlspecialchars($item['titre']) ?>">
                        
                        <div class="item-info">
                            <h3><?= htmlspecialchars($item['titre']) ?></h3>
                            <p class="item-price">€<?= number_format($item['prix'], 0, ',', ' ') ?></p>
                        </div>

                        <div class="item-total">
                            <p>€<?= number_format($item['prix'], 0, ',', ' ') ?></p>
                        </div>

                        <div class="item-remove">
                            <form action="/panier/remove" method="POST">
                                <input type="hidden" name="cart_id" value="<?= $item['id'] ?>">
                                <button type="submit" class="btn-remove">×</button>
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="cart-summary">
                <div class="summary-row">
                    <span>Sous-total</span>
                    <span>€<?= number_format($total, 0, ',', ' ') ?></span>
                </div>
                <div class="summary-row">
                    <span>Taxe (67%)</span>
                    <span>€<?= number_format($total * 0.67, 0, ',', ' ') ?></span>
                </div>
                <div class="summary-row total-row">
                    <span>Total</span>
                    <span>€<?= number_format($total * 1.67, 0, ',', ' ') ?></span>
                </div>

                <div class="cart-actions">
                    <button class="btn btn-primary">Procéder au paiement</button>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

<style>
.cart-page {
    background: #f8f8f8;
    min-height: calc(100vh - 140px);
    padding: 40px 20px;
}

.cart-container {
    max-width: 1200px;
    margin: 0 auto;
}

.cart-container h1 {
    font-size: 32px;
    font-weight: 700;
    margin-bottom: 30px;
}

.alert {
    padding: 12px 16px;
    border-radius: 4px;
    margin-bottom: 20px;
}

.alert-success {
    background: #efe;
    color: #3c3;
    border: 1px solid #cfc;
}

.alert-error {
    background: #fee;
    color: #c33;
    border: 1px solid #fcc;
}

.empty-cart {
    text-align: center;
    padding: 60px 20px;
    background: white;
    border-radius: 8px;
}

.empty-cart p {
    font-size: 18px;
    margin-bottom: 20px;
}

.cart-items {
    background: white;
    border-radius: 8px;
    padding: 20px;
    margin-bottom: 20px;
}

.cart-item {
    display: grid;
    grid-template-columns: 80px 1fr 150px 100px 50px;
    gap: 20px;
    align-items: center;
    padding: 20px 0;
    border-bottom: 1px solid #e5e5e5;
}

.cart-item:last-child {
    border-bottom: none;
}

.cart-item img {
    width: 80px;
    height: 80px;
    object-fit: contain;
}

.item-info h3 {
    font-size: 16px;
    font-weight: 600;
    margin: 0 0 8px 0;
}

.item-price {
    font-size: 14px;
    color: #666;
    margin: 0;
}

.quantity-form {
    display: flex;
    gap: 8px;
    align-items: center;
}

.quantity-form input {
    width: 60px;
    padding: 6px;
    border: 1px solid #ddd;
    border-radius: 4px;
    text-align: center;
}

.btn-update {
    padding: 6px 12px;
    background: #000;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 12px;
}

.btn-update:hover {
    background: #333;
}

.item-total {
    font-size: 16px;
    font-weight: 600;
    text-align: right;
}

.item-remove {
    display: flex;
    justify-content: center;
    align-items: center;
}

.btn-remove {
    background: #fff;
    border: 1px solid #ddd;
    border-radius: 50%;
    width: 30px;
    height: 30px;
    font-size: 24px;
    line-height: 1;
    cursor: pointer;
    color: #666;
    display: flex;
    align-items: center;
    justify-content: center;
}

.btn-remove:hover {
    background: #fee;
    border-color: #c33;
    color: #c33;
}

.cart-summary {
    background: white;
    border-radius: 8px;
    padding: 20px;
}

.summary-row {
    display: flex;
    justify-content: space-between;
    padding: 10px 0;
    font-size: 16px;
}

.total-row {
    border-top: 2px solid #000;
    margin-top: 10px;
    padding-top: 20px;
    font-size: 20px;
    font-weight: 700;
}

.cart-actions {
    display: flex;
    gap: 12px;
    margin-top: 20px;
}

.btn {
    flex: 1;
    padding: 14px 20px;
    border: none;
    border-radius: 4px;
    font-size: 16px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.2s;
}

.btn-primary {
    background: #000;
    color: white;
}

.btn-primary:hover {
    background: #333;
}

.btn-secondary {
    background: #fff;
    color: #000;
    border: 2px solid #000;
}

.btn-secondary:hover {
    background: #f5f5f5;
}

@media (max-width: 768px) {
    .cart-item {
        grid-template-columns: 60px 1fr;
        gap: 10px;
    }
    
    .item-quantity,
    .item-total {
        grid-column: 2;
    }
}
</style>
