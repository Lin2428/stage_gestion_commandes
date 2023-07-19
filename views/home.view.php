<?php
$path = str_replace('/', DS, 'assets/image/categories/*.*');
$path = ROOT . $path;
$images = glob($path);
$images = array_map(fn($path) => pathinfo($path, PATHINFO_BASENAME), $images);
?>

<div class="baner">
    <div class="baner-text">
        <p class="baner-title">
            UNLIMITED <br>
            MEDIUM <span class="text-primary">PIZZAS</span>
        </p>
        <p class="baner-text-1">Medium 2-topping* pizza</p>
        <p class="baner-text-2">Additional charge for premium toppings. Minimum of 2 required</p>
    </div>
    <img class="max-w-[100%] min-w-0" src="<?= base_url('/assets/image/hamberger.png') ?>" alt="">
</div>

<section class="categories">
    <div class="category-container">
        <?php foreach ($categories as $k => $category): ?>
            <a href="#" class="category flex flex-col items-center mx-auto">
                <svg xmlns="http://www.w3.org/2000/svg" class="category-splash" viewBox="0 0 166 156">
                    <path
                        d="M0 51.6c0-5 4.4-6.6 10.2-6.6 6.6 0 15.2 5.6 15.2 10 0 2.8-3.8 5-11.2 5C5.2 60 0 56.4 0 51.6zm15 47c0-12.2 35.6-.2 35.6-20.2 0-8.4-15-11-15-17 0-7.6 28.4.8 28.4-12.6 0-8.4-13.8-9.8-13.8-21 0-2.8 1.6-5.4 4.6-5.4 13.4 0 6 26.6 26.2 26.6 7.6 0 11.6-5.6 11.6-14.2 0-10.2-4-13.6-4-25.2C88.6 5 91.4 0 97.2 0c5.4 0 9 5 9 10.2 0 13.4-6 13.8-6 25.8 0 18 8 22.4 22.8 22.4 8.4 0 12.6-16 21.4-16 7 0 9.8 4.4 9.8 9 0 11-29.8 3.4-29.8 28.6 0 30 41.6 12.6 41.6 31.8 0 4.2-2.2 7.8-7 7.8-14.6 0-12.8-15.4-43-15.4-11 0-13 9.8-13 18 0 11 7.6 12.8 7.6 18.8 0 5-4 7.4-8.6 7.4-13 0 1.2-38.6-24.4-38.6-26.2 0-16 46.2-39.8 46.2-5 0-8.4-3-8.4-8.4 0-20.4 28.4-19.8 28.4-41 0-7.8-6.2-10.2-11.4-10.2-10.2 0-17.6 6.8-24.2 6.8-4.2 0-7.2-1.4-7.2-4.6zM124 147c0-5 4-9 9-9s9 4 9 9-4 9-9 9-9-4-9-9z" />
                </svg> 
                <img class="category-img z-10" src="<?= base_url('/assets/image/categories/' . $images[$k % count($images)]) ?>"alt="">
                <span class="category-title">
                    <?= $category->getNom() ?>
                </span>
            </a>
        <?php endforeach ?>
    </div>
</section>

<section class="produit">
    <div class="produits-container">
        <?php foreach ($produits as $produit): ?>
            <div class="card">
                <div class="card-head">
                    <div class="card-links">
                        <span class="statut">Sale!</span>
                        <a href="#" class="text-gray-200 z-10  hover:text-black"><i
                                class="bi bi-heart-fill text-xl"></i></a>
                    </div>
                    <img class="card-img" src="<?= base_url('/assets/dist/img/' . $produit->getImage()) ?>" alt="">
                </div>
                <div class="card-body">
                    <div class="star flex">
                        <span class="text-yellow-500"><i class="bi bi-star-fill"></i></i></span>
                        <span class="text-yellow-500"><i class="bi bi-star-fill"></i></i></span>
                        <span class="text-yellow-500"><i class="bi bi-star-fill"></i></i></span>
                        <span class="text-gray-200"><i class="bi bi-star"></i></span>
                        <span class="text-gray-200"><i class="bi bi-star"></i></span>
                    </div>
                    <p class="title">
                        <?= $produit->getNom() ?>
                    </p>
                    <p class="desc">
                        <?= $produit->getDescription() ?>
                    </p>
                    <div class="card-footer">
                        <span class="prix-produit text-primary font-bold text-lg">
                            <?= $produit->getPrix() ?> XAF
                        </span>
                        <a href="" class="bg-primary px-3 py-2 w-[2.5rem] hover:text-white rounded-2xl"><i
                                class="bi bi-basket2-fill"></i></i></a>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</section>
<br><br><br>