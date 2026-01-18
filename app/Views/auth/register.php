<div class="auth-container">
    <div class="auth-box">
        <h1>Inscription</h1>
        
        <?php if (isset($error)): ?>
            <div class="alert alert-error">
                <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>

        <form action="/register/do" method="POST" class="auth-form">
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" id="nom" name="nom" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" required>
            </div>

            <button type="submit" class="btn btn-primary">S'inscrire</button>
        </form>

        <div class="auth-footer">
            <p><a href="/login">Connexion</a></p>
        </div>
    </div>
</div>

<style>
.auth-container {
    min-height: calc(100vh - 140px);
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 40px 20px;
    background: #f8f8f8;
}

.auth-box {
    background: white;
    padding: 40px;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    width: 100%;
    max-width: 400px;
}

.auth-box h1 {
    margin: 0 0 30px 0;
    font-size: 28px;
    text-align: center;
}

.alert {
    padding: 12px 16px;
    border-radius: 4px;
    margin-bottom: 20px;
    font-size: 14px;
}

.alert-error {
    background: #fee;
    color: #c33;
    border: 1px solid #fcc;
}

.auth-form {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.form-group {
    display: flex;
    flex-direction: column;
    gap: 8px;
}

.form-group label {
    font-weight: 600;
    font-size: 14px;
}

.form-group input {
    padding: 12px 16px;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 14px;
    transition: border-color 0.2s;
}

.form-group input:focus {
    outline: none;
    border-color: #000;
}

.btn {
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

.auth-footer {
    margin-top: 20px;
    text-align: center;
    font-size: 14px;
}

.auth-footer a {
    color: #000;
    text-decoration: underline;
}
</style>
