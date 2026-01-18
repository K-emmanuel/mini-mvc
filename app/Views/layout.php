<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= isset($title) ? htmlspecialchars($title) : '6 7 LABUBU' ?></title>
    <link rel="icon" type="image/gif" href="/assets/images/bosnov-67.gif">
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="/assets/css/style.css" rel="stylesheet">
    <link href="/assets/css/header.css" rel="stylesheet">
    <link href="/assets/css/sidebar.css" rel="stylesheet">
    <link href="/assets/css/carousel.css" rel="stylesheet">
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="header-container">
            <div class="logo">
                <img src="/assets/images/bosnov-67.gif" alt="Logo" class="logo-gif">
                <a href="/">6 7 LABUBU</a>
                <img src="/assets/images/giphy.gif" alt="Logo Right" class="logo-gif">
            </div>

            <nav class="nav">
                <a href="/panier" class="nav-icon">
                    Panier
                </a>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <a href="/account" class="nav-icon">
                        <?= htmlspecialchars($_SESSION['user_nom']) ?>
                    </a>
                <?php else: ?>
                    <a href="/login" class="nav-icon">
                        Compte
                    </a>
                <?php endif; ?>
            </nav>
        </div>
    </header>
    <header class="header-spacer"></header>

    <!-- Main Content -->
    <main>
        <?= $content ?>
    </main>

</body>
</html>

