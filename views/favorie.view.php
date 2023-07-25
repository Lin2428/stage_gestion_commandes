<div class="shop-baner">
    <div class="">
        <p class="text-bold text-5xl mb-4">Wishlist</p>
        <span class="px-3 font-sans ml-6"><a href="./home" class="text-gray-400 hover:text-primary">Home</a> 
        <span class="font-bold text-xs text-gray-400"><i class="bi bi-chevron-right"></i></span> Wishlist</span>
    </div>
</div>

<div class="favorie-container">
    <?php foreach ($produitFavorie as $favorie): ?>
        <div class="favorie">
            <div class="md:flex items-center md:divide-x w-[50%] ">
                <a href="" class="md:p-3 hover:text-primary text-gray-400"><i class="bi bi-x"></i></a>
                <a href="" class=""><img src="<?= image($favorie->getImage()) ?>"
                        class="md:max-w-[110px]  max-w-[120px] min-w-[70px] md:p-4" alt=""></a>
                <div class="md:py-8 pl-2">
                    <a href="" class="text-sm font-bold text-primary">
                        <?= $favorie->getNom() ?>
                    </a><br>
                    <span class="font-sans text-gray-500">
                        <?= $favorie->getPrix() ?> XAF
                    </span>
                </div>
            </div>
            <div class="md:mr-auto md:py-[1.85rem] py-2 px-3">
                <button class="rounded-lg bg-primary p-4 font-[500] text-sm font-sans hover:text-white"><i
                        class="bi bi-basket2-fill"></i></button>
            </div>
        </div>
    <?php endforeach ?>
</div>