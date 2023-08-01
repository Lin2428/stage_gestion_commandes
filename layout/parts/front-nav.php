<?php
$cartItems = PanierRepository::getItemCount();
$FavorieItems = FavorieRepository::getItemCount();
?>
<nav class="nav">
    <a href="/" class="nav-logo">Logo</a>

    <div class="nav-contact">
        <i class="bi bi-truck"></i>
        <div>
            <span class="nav-contact-title">Call or Order it</span>
            <span class="nav-contact-phone">(+242) 06 100 75 50</span>
        </div>
    </div>

    <div class="nav-links">
    <a href="../../shop.php" class="nav-link">
        <i class="bi bi-shop"></i>
    </a>
        <a href="#" class="nav-link">
            <i class="bi bi-search"></i>
        </a>
        <a href="../../panier.php" class="nav-link">
            <span class="badge"><?= $cartItems ?></span>
            <i class="bi bi-basket2-fill"></i>
        </a>
        <a href="/favorie.php" class="nav-link">
            <span class="badge"><?= $FavorieItems ?></span>
            <i class="bi bi-bag-heart-fill"></i>
        </a>
        <a href="../../compte.php" class="nav-link">
            <i class="bi bi-person-circle"></i>
        </a>
    </div>
</nav>

<nav class="nav-mobile">
    <div class="nav-links">
        <a href="../../shop.php" class="nav-link">
            <i class="bi bi-shop"></i>
            <span class="nav-title">Shop</span>
        </a>
        <a href="#" class="nav-link">
            <i class="bi bi-search"></i>
            <span class="nav-title">Recherche</span>
        </a>
        <a href="../../panier.php" class="nav-link">
            <span class="badge"><?= $cartItems ?></span>
            <i class="bi bi-basket2-fill"></i>
            <span class="nav-title">Panier</span>
        </a>
        <a href="../../favorie.php" class="nav-link">
            <span class="badge"><?= $FavorieItems ?></span>
            <i class="bi bi-bag-heart-fill"></i>
            <span class="nav-title">Favoris</span>
        </a>
        <a href="#" class="nav-link">
            <i class="bi bi-person-circle"></i>
            <span class="nav-title">Mon compte</span>
        </a>
    </div>
</nav>