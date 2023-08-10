<?php
$message = read_flash_message();
?>

<div class="shop-baner">
    <p class="titre-baner">Panier</p>
    <span class="link-baner"><a href="/" class="text-gray-400 hover:text-primary">Home</a>
        <span class="font-bold text-xs text-gray-400"><i class="bi bi-chevron-right"></i></span> Panier</span>
</div>
<br>
<?php if ($message) : ?>
    <div class="flex justify-center w-[100%]">
        <div class="alert-succes mb-4"><?= $message ?></div>
    </div>
<?php endif ?>
<?php if (!empty($panier)) : ?>
    <div class="grid md:grid-cols-3 p-6 mt-16">
        <div class="panier col-span-2">
            <div class="md:grid grid-cols-5 border-b-[0.05px] py-5 hidden">
                <p></p>
                <p class="mx-auto text-sm font-[600] font-sans">PRODUIT</p>
                <p class="mx-auto text-sm font-[600] font-sans">PRIX</p>
                <p class="mx-auto text-sm font-[600] font-sans">CONTITE</p>
                <p class="mx-auto text-sm font-[600] font-sans">TOTAL</p>
            </div>
            <form method="POST" class="md:block hidden">
                <input type="hidden" name="update_panier">
                <?php foreach ($panier as $produit) : ?>
                    <div class="produit-panier grid grid-cols-5 items-center justify-center">
                        <div class="flex items-center justify-between">
                            <a href="delete.php/?del=<?= $produit->getItemId() ?>" class="text-gray-400 text-sm hover:text-primary"><i class="bi bi-x-circle"></i></a>
                            <a href="/description.php/?id=<?= $produit->getProduitId() ?>"><img src="<?= image($produit->getProduitImage()) ?>" class="max-w-[90px]" alt=""></a>
                        </div>
                        <a href="/description.php/?id=<?= $produit->getProduitId() ?>" class="mx-auto text-sm font-[600] hover:text-primary">
                            <?= $produit->getProduitNom() ?>
                        </a>
                        <p class="mx-auto text-sm font-[600]">
                            <?= $produit->getProduitPrix() ?>
                        </p>
                        <div class="mx-auto">
                            <input type="number" name="quanite<?= $produit->getProduitId() ?>" value="<?= $produit->getQuantite(); ?>" min="0" class="border border-gray-200 p-3 font-[500] w-16 rounded-md h-10 outline-1 outline-primary ">
                        </div>
                        <p class="mx-auto font-bold">
                            <?= $produit->getTotal() ?>
                        </p>
                    </div>
                <?php endforeach ?>
                <div class="md:flex justify-end">
                    <button type="submit" class="bg-primary md:w-auto w-[100%] mb-5 p-4 rounded-md mt-5 text-sm font-bold hover:bg-[#eeac00] hover:text-white transition-all duration-300">MODIFIER LE
                        PANIER</button>
                </div>
            </form>

            <!-- ECRAN MOBILE -->
            <form method="POST" class="md:hidden block">
                <input type="hidden" name="update_panier">
                <?php foreach ($panier as $produit) : ?>
                    <div class="md:hidden grid grid-cols-3 items-center border-b-[0.5px]">
                        <a href="/description.php/?id=<?= $produit->getProduitId() ?>"><img src="<?= image($produit->getProduitImage()) ?>" class="max-w-[90px]" alt=""></a>
                        <div class="col-span-2">
                            <div class="detail-panier-mobile">
                                <a href="/description.php/?id=<?= $produit->getProduitId() ?>" class="text-sm font-[600] hover:text-primary">
                                    <?= $produit->getProduitNom() ?>
                                </a>
                                <a href="delete.php/?del=<?= $produit->getItemId() ?>" class="text-gray-400 text-sm hover:text-primary"><i class="bi bi-x-circle"></i></a>
                            </div>
                            <div class="detail-panier-mobile">
                                <span class="titre">Prix</span>
                                <a href="" class="text-sm font-[600] hover:text-primary">
                                    <?= $produit->getProduitPrix() ?>
                                </a>
                            </div>
                            <div class="detail-panier-mobile">
                                <span class="titre">Quantité</span>
                                <div>
                                    <input type="number" name="quanite<?= $produit->getProduitId() ?>" value="<?= $produit->getQuantite(); ?>" min="0" class="border border-gray-200 p-3 font-[500] w-16 rounded-md h-10 outline-1 outline-primary ">
                                </div>
                            </div>
                            <div class="detail-panier-mobile border-none">
                                <span class="titre">Total</span>
                                <span class="font-bold">
                                    <?= $produit->getTotal() ?>
                                </span>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
                <div class="md:flex justify-end">
                    <button type="submit" class="bg-primary md:w-auto w-[100%] mb-5 p-4 rounded-md mt-5 text-sm font-bold hover:bg-[#eeac00] hover:text-white transition-all duration-300">MODIFIER LE
                        PANIER</button>
                </div>
            </form>
        </div>

        <div class="md:col-span-1 col-span-2 mb-20 mx-auto border-[5px] md:w-[90%] w-[100%] px-6 h-[390px]">
            <div>
                <p class="font-bold pt-3 pb-2 border-b-2 text-lg font-sans">TOTAL PANIER</p>
            </div>
            <div class="flex justify-between items-center py-5 border-b-[0.05px]">
                <sapn class="text-sm font-bold">TOTAL</sapn>
                <sapn class="font-bold">
                    <?= number_format($total, 0, thousands_separator: " ") ?> XAF
                </sapn>
            </div>
            <div class="flex justify-between py-5 border-b-[0.05px]">
                <sapn class="text-sm font-bold">LIVRAISON</sapn>
                <p class="font-sans text-gray-500">Assuré</p>
            </div>
            <div class="flex justify-between items-center pt-8">
                <sapn class="text-sm font-bold">TOTAL</sapn>
                <sapn class="text-primary font-bold text-lg">
                    <?= number_format($total, 0, thousands_separator: " ") ?> XAF
                </sapn>
            </div>

            <a href="/validation.php">
                <button class="w-[100%]  bg-primary hover:bg-[#eeac00] hover:text-white p-3 rounded-md mt-[3rem] mb-8 text-sm font-bold transition-all duration-300">PROCEDER
                    AU PAYEMENT</button>
            </a>
        </div>
    </div>
<?php else : ?>
    <?php if (isset($_GET['passer'])) : ?>
        <div class="flex flex-col justify-center items-center">
            <div class="alert-succes"><?= read_flash_message() ?></div>
        </div>
    <?php endif ?>
    <div class="flex flex-col items-center mt-6 mb-[10rem]">
        <span class="text-[12rem] text-[#999999] "><i class="bi bi-cart-x"></i></span>
        <span class="-mt-12 font-sans text-lg text-gray-900 mb-[4rem]">Votre panier est actuellement vide</span>
        <a href="shop.php"><button class="bg-primary font-[600] text-sm rounded-md hover:text-white p-4 transition-all duration-300">RETOURNER A LA
                BOUTIQUE</button></a>
    </div>
<?php endif ?>