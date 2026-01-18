<div class="account-container">
    <div class="account-box">
        <h1>Mon Compte</h1>
        
        <div class="account-info">
            <div class="info-group">
                <label>Nom</label>
                <p><?= htmlspecialchars($user['nom']) ?></p>
            </div>

            <div class="info-group">
                <label>Email</label>
                <p><?= htmlspecialchars($user['email']) ?></p>
            </div>

            <div class="info-group">
                <label>Membre depuis</label>
                <p><?= date('d/m/Y', strtotime($user['created_at'] ?? 'now')) ?></p>
            </div>
        </div>

        <div class="account-actions">
            <a href="/" class="btn btn-secondary">Retour à l'accueil</a>
            <a href="/logout" class="btn btn-danger">Se déconnecter</a>
        </div>
    </div>
</div>

<style>
.account-container {
    min-height: calc(100vh - 140px);
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 40px 20px;
    background: #f8f8f8;
}

.account-box {
    background: white;
    padding: 40px;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    width: 100%;
    max-width: 500px;
}

.account-box h1 {
    margin: 0 0 30px 0;
    font-size: 28px;
    text-align: center;
}

.account-info {
    display: flex;
    flex-direction: column;
    gap: 20px;
    margin-bottom: 30px;
}

.info-group {
    display: flex;
    flex-direction: column;
    gap: 4px;
}

.info-group label {
    font-weight: 600;
    font-size: 14px;
    color: #666;
}

.info-group p {
    margin: 0;
    font-size: 16px;
    color: #000;
}

.account-actions {
    display: flex;
    gap: 12px;
    justify-content: center;
}

.btn {
    padding: 12px 24px;
    border: none;
    border-radius: 4px;
    font-size: 14px;
    font-weight: 600;
    cursor: pointer;
    text-decoration: none;
    display: inline-block;
    transition: all 0.2s;
}

.btn-secondary {
    background: #f0f0f0;
    color: #000;
}

.btn-secondary:hover {
    background: #e0e0e0;
}

.btn-danger {
    background: #dc3545;
    color: white;
}

.btn-danger:hover {
    background: #c82333;
}
</style>
