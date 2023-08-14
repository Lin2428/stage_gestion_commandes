<?php
$message = read_flash_message();
?>

<div class="flex justify-between items-center p-5 w-[100%] bg-shop bg-cover mb-10">
    <div class="md:flex">
        <a href="/" class=" font-sans text-gray-500 hover:text-primary">Home ></a><a href="" class=" font-sans text-gray-500 hover:text-primary">
            <?= $produit->getCategory() ?> >
        </a>
        <p class="font-sans text-gray-600">
            <?= $produit->getNom() ?>
        </p>
    </div>

    <div>
        <a href="./?id=<?= $prev->getId() ?>" class="btn-produit-prev bg-primary hover:bg-orange-400 mr-2 rounded-full px-3.5 py-2  font-bold text-sm">
            < <div class="prev">
                <img class="prev-image" src="<?= image($prev->getImage()) ?>" alt="">
                <p>
                    <span class="font-bold text-sm">
                        <?= $prev->getNom() ?>
                    </span><br>
                    <span class="text-primary font-sans">
                        <?= $prev->getPrix() ?> XAF
                    </span>
                </p>
    </div>
    </button>
    <a href="./?id=<?= $next->getId() ?>" class="btn-produit-nex bg-primary hover:bg-orange-400 rounded-full px-3.5 py-2 font-bold text-sm">>
        <div class="nex">
            <img class="prev-image" src="<?= image($next->getImage()) ?>" alt="">
            <p>
                <span class="font-bold text-sm">
                    <?= $next->getNom() ?>
                </span><br>
                <span class="text-primary font-sans">
                    <?= $next->getPrix() ?> XAF
                </span>
            </p>
        </div>
    </a>
</div>

</div>
    <?php if ($message) : ?>
        <div class="flex justify-center w-[100%]">
            <div class="alert-succes mb-4"><?= $message ?></div>
        </div>
    <?php endif ?>
<div class="description md:mb-5 mb-[10rem]">
    <div class="desc-image">
        <img class="mx-auto" src="<?= image($produit->getImage()) ?>" alt="">
    </div>
    <div class="desc-text">
        <p class="title-desc">
            <?= $produit->getNom() ?>
        </p>
        <div class="star flex text-sm font-sans mb-5">
            <span class="text-yellow-500"><i class="bi bi-star-fill"></i></i></span>
            <span class="text-yellow-500"><i class="bi bi-star-fill"></i></i></span>
            <span class="text-yellow-500"><i class="bi bi-star-fill"></i></i></span>
            <span class="text-gray-200"><i class="bi bi-star"></i></span>
            <span class="text-gray-200"><i class="bi bi-star"></i></span>
        </div>
        <p class="font-sans text-gray-500 mb-5">
            <?= $produit->getDescription() ?>
        </p>
        <p class="text-2xl font-bold text-primary mb-3">
            <?= $produit->getPrix() ?> XAF
        </p>
        <?php if ($produit->getStatut()) : ?>
            <form class="quantite" method="POST" action="/add_produit.php">
                <input type="hidden" name="action" value="_add_to_cart">
                <input type="hidden" name="currentPage" value="<?= $_SERVER['PHP_SELF'] . '/?id=' .  $produit->getId() ?>">
                <input type="hidden" name="id" value="<?= $produit->getId() ?>">
                <div>
                    <!-- <button class="bg-[#f7f4ef] rounded-full px-3 py-1.5 font-bold text-sm">-</button> -->
                    <input type="number" name="quantite" value="<?= $countProduit ?>" min="1" class="border border-gray-200 p-3 font-[500] w-16 rounded-md h-10 outline-1 outline-primary ">
                    <!-- <button class="bg-[#f7f4ef] rounded-full px-3 py-1.5 font-bold text-sm">+</button> -->

                </div>
                <div class="md:w-[70%] md:mt-0 mt-4 flex">
                    <button type="submit" class="bg-primary p-4 mr-1 rounded-md hover:text-white w-[80%] font-bold text-xs transition-all duration-300"><i class="bi bi-basket2-fill"></i> AJOUTER AU PANIER</button>
            </form>
            <form action="/add_produit.php" method="post" class="">
                <input type="hidden" name="action" value="_add_to_favorie">
                <input type="hidden" name="currentPage" value="<?= $_SERVER['PHP_SELF'] . '?id=' . $produit->getId() ?>">
                <input type="hidden" name="id" value="<?= $produit->getId() ?>">
                <button type="submit" class="<?= $produit->isInFavorite() ? 'in-fav' : 'text-gray-300' ?> px-4 py-3 bg-gray-100 rounded-md"><i class="bi bi-heart-fill"></i></button>
            </form>
    </div>
<?php else : ?>
    <div class="quantite">
        <input type="number" disabled value="1" class="border border-gray-200 p-3 font-[500] w-16 rounded-md h-10 outline-1 ">
        <div class="md:w-[70%] md:mt-0 mt-4 flex">
            <span class="flex justify-center bg-orange-300 p-4 mr-1 rounded-md w-[80%] font-bold text-xs text-gray-400 "><i class="bi bi-basket2-fill text-gray-400"></i> AJOUTER AU PANIER</span>
            <form action="/add_produit.php" method="post" class="">
                <input type="hidden" name="action" value="_add_to_favorie">
                <input type="hidden" name="currentPage" value="<?= $_SERVER['PHP_SELF'] . '?id=' . $produit->getId() ?>">
                <input type="hidden" name="id" value="<?= $produit->getId() ?>">
                <button type="submit" class="<?= $produit->isInFavorite() ? 'in-fav' : 'text-gray-300' ?> px-4 py-3 bg-gray-100 rounded-md"><i class="bi bi-heart-fill"></i></button>
            </form>
        </div>
    </div>
<?php endif ?>


<p class="font-sans text-sm">Catégorie:
    <a href="" class="font-borld text-sm text-gray-400 hover:text-primary hover:underline">
        <?= $produit->getCategory() ?>
    </a>
</p>
<?php if ($produit->getStatut()) : ?>
    <p class="font-borld text-sm text-gray-400">Disponible</p>
<?php else : ?>
    <p class="font-borld text-sm text-gray-400">Indisponible</p>
<?php endif ?>

</div>
</div>