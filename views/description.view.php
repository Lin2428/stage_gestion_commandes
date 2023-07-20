<div class=" h-[4rem] w-[100%] bg-primary/10"></div>

<div class="description">
    <div class="desc-image">
        <img class="mx-auto" src="<?= image($produit[0]->getImage()) ?>" alt="">
    </div>
    <div class="desc-text">
        <p class="title-desc">
            <?= $produit[0]->getNom() ?>
        </p>
        <div class="star flex text-sm font-sans mb-5">
            <span class="text-yellow-500"><i class="bi bi-star-fill"></i></i></span>
            <span class="text-yellow-500"><i class="bi bi-star-fill"></i></i></span>
            <span class="text-yellow-500"><i class="bi bi-star-fill"></i></i></span>
            <span class="text-gray-200"><i class="bi bi-star"></i></span>
            <span class="text-gray-200"><i class="bi bi-star"></i></span>
        </div>
        <p class="font-sans text-gray-500 mb-5">
            <?= $produit[0]->getDescription() ?>
        </p>
        <p class="text-2xl font-bold text-primary mb-3">
            <?= $produit[0]->getPrix() ?> XAF
        </p>
        <div class="quantite">
            <button class="bg-[#f7f4ef] rounded-full px-3 py-1.5 font-bold text-sm">-</button>
            <span class="p-2">1</span>
            <button class="bg-[#f7f4ef] rounded-full px-3 py-1.5 font-bold text-sm">+</button>
            <button class="bg-primary p-4 rounded-md hover:text-white md:w-[60%] w-[50%] font-bold text-xs md:ml-12"><i class="bi bi-basket2-fill"></i> AJOUTER AU PANIER</button>
            <button class="px-4 py-3 bg-gray-200 rounded-md text-gray-400 hover:text-primary"><i class="bi bi-heart-fill"></i></button>
        </div>
        <p class="font-sans text-sm">Catégorie:
            <a href="" class="font-borld text-sm text-gray-400 hover:text-primary hover:underline"><?= $produit[0]->getCategory() ?></a>
        </p>
    </div>
</div>