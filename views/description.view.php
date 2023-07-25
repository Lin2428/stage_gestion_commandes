<div class="flex justify-between items-center p-5 w-[100%] bg-shop bg-cover mb-10">
    <div class="md:flex">
        <a href="" class=" font-sans text-gray-500 hover:text-primary">Home ></a><a href=""
            class=" font-sans text-gray-500 hover:text-primary">
            <?= $produit[0]->getCategory() ?> >
        </a><p class="font-sans text-gray-600">
            <?= $produit[0]->getNom() ?>
        </p>
    </div>
    <div>
        <a href="./?id=<?= $prev->getId() ?>" class="btn-produit-prev bg-primary hover:bg-orange-400 mr-2 rounded-full px-3.5 py-2  font-bold text-sm">< 
        <div class="prev">
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
            <div>
                <button class="bg-[#f7f4ef] rounded-full px-3 py-1.5 font-bold text-sm">-</button>
                <span class="p-2">1</span>
                <button class="bg-[#f7f4ef] rounded-full px-3 py-1.5 font-bold text-sm">+</button>
                
            </div>
            <div class="md:w-[70%] md:mt-0 mt-4">
                <button class="bg-primary p-4 rounded-md hover:text-white w-[80%] font-bold text-xs"><i class="bi bi-basket2-fill"></i> AJOUTER AU PANIER</button>
                <button class="px-4 py-3 bg-gray-100 rounded-md text-gray-400 hover:text-primary"><i class="bi bi-heart-fill"></i></button>
            </div>
        </div>
        <p class="font-sans text-sm">Catégorie:
            <a href="" class="font-borld text-sm text-gray-400 hover:text-primary hover:underline">
                <?= $produit[0]->getCategory() ?>
            </a>
        </p>
    </div>
</div>