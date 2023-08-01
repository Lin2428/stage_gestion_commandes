<div class="shop-baner">
    <p class="titre-baner">Favorie</p>
    <span class="link-baner"><a href="/" class="text-gray-400 hover:text-primary">Home</a>
        <span class="font-bold text-xs text-gray-400"><i class="bi bi-chevron-right"></i></span> Favorie</span>
</div>

<?php if (!empty($favories)) : ?>
    <div class="favorie-container">
        <?php foreach ($favories as $favorie) : ?>
            <div class="favorie">
                <div class="md:flex items-center md:divide-x w-[50%] ">
                    <form action="/add_produit.php" method="post" class="flex">
                        <input type="hidden" name="action" value="_add_to_favorie">
                        <input type="hidden" name="currentPage" value="<?= $_SERVER['PHP_SELF'] ?>">
                        <input type="hidden" name="id" value="<?= $favorie->getProduitId() ?>">
                        <button type="submit" class="md:p-3 hover:text-primary text-gray-400"><i class="bi bi-x"></i></button>
                    </form>
                   <div class="md:block md:w-auto w-[190%] flex justify-center">
                     <a href="/description.php/?id=<?= $favorie->getProduitId() ?>" class=""><img src="<?= image($favorie->getProduitImage()) ?>" class="md:max-w-[110px]  max-w-[120px] min-w-[70px] md:p-4" alt=""></a>
                   </div>
                    <div class="md:py-[1.10rem] pl-2">
                        <a href="/description.php/?id=<?= $favorie->getProduitId() ?>" class="text-sm font-bold text-primary">
                            <?= $favorie->getProduitNom() ?>
                        </a><br>
                        <span class="font-sans text-gray-500">
                            <?= $favorie->getProduitPrix() ?> XAF
                        </span>
                        <p class="font-sans text-gray-500">
                            <?= $favorie->getcreatedAt() ?>
                        </p>
                    </div>
                </div>
                <div class="md:mr-auto md:py-[1.85rem] py-2 px-3">
                    <form method="post" action="/add_produit.php" style="display: inline;">
                        <input type="hidden" name="currentPage" value="<?= $_SERVER['PHP_SELF'] ?>">
                        <input type="hidden" name="action" value="_add_to_cart">
                        <input type="hidden" name="id" value="<?= $favorie->getProduitId() ?>">
                        <button class="bg-primary px-3 py-2 w-[2.5rem] hover:text-white rounded-xl"><i class="bi bi-basket2-fill"></i></i></button>
                    </form>
                </div>
            </div>
        <?php endforeach ?>
    </div>
<?php else : ?>
    <div class="flex flex-col items-center mt-6 mb-[10rem]">
        <span class="text-[12rem] text-[#999999] "><i class="bi bi-bag-x"></i></i></span>
        <span class="-mt-12 font-sans text-lg text-gray-900 mb-[4rem]">Vous n'avez ajouté aucun favorie</span>
        <a href="shop.php"><button class="bg-primary font-[600] text-sm rounded-md hover:text-white p-4">RETOURNER A LA BOUTIQUE</button></a>
    </div>
<?php endif ?>