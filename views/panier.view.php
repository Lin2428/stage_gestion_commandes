<?= baner(title: "Panier") ?>

<?php if ($_SESSION['panier']): ?>
    <div class="grid md:grid-cols-3 p-6 mt-16">
        <div class="panier col-span-2">
            <div class="md:grid grid-cols-5 border-b-[0.05px] py-5 hidden">
                <p></p>
                <p class="mx-auto text-sm font-[600] font-sans">PRODUIT</p>
                <p class="mx-auto text-sm font-[600] font-sans">PRIX</p>
                <p class="mx-auto text-sm font-[600] font-sans">CONTITE</p>
                <p class="mx-auto text-sm font-[600] font-sans">TOTAL</p>
            </div>
            <?php foreach ($produits as $produit): ?>
                <div class="produit-panier md:grid hidden grid-cols-5 items-center justify-center">
                    <div class="flex items-center justify-between">
                        <a href="" class="text-gray-400 text-sm hover:text-primary"><i class="bi bi-x-circle"></i></a>
                        <a href=""><img src="<?= image($produit->getImage()) ?>" class="max-w-[90px]" alt=""></a>
                    </div>
                    <a href="" class="mx-auto text-sm font-[600] hover:text-primary">
                        <?= $produit->getNom() ?>
                    </a>
                    <p class="mx-auto text-sm font-[600]">
                        <?= $produit->getPrix() ?> XAF
                    </p>
                    <form method="POST" class="mx-auto">
                        <input type="number" class="border border-gray-200 w-14 rounded-md h-10 outline-1 outline-primary ">
                    </form>
                    <p class="mx-auto font-bold">3500 XAF</p>
                </div>

                <!-- ECRAN MOBILE -->
                <div class="md:hidden grid grid-cols-3 border-b-[0.5px] items-center">
                    <a href=""><img src="<?= image($produit->getImage()) ?>" class="max-w-[90px]" alt=""></a>
                    <div class="col-span-2">
                        <div class="detail-panier-mobile">
                            <a href="" class="text-sm font-[600] hover:text-primary">
                                <?= $produit->getNom() ?>
                            </a>
                            <a href="" class="text-gray-400 text-sm hover:text-primary"><i class="bi bi-x-circle"></i></a>
                        </div>
                        <div class="detail-panier-mobile">
                            <span class="titre">Prix</span>
                            <a href="" class="text-sm font-[600] hover:text-primary">
                                <?= $produit->getPrix() ?> XAF
                            </a>
                        </div>
                        <div class="detail-panier-mobile">
                            <span class="titre">Quantité</span>
                            <form method="POST">
                                <input type="number"
                                    class="border border-gray-200 w-14 rounded-md h-10 outline-1 outline-primary ">
                            </form>
                        </div>
                        <div class="detail-panier-mobile border-none">
                            <span class="titre">Total</span>
                            <span class="font-bold">3500 XAF</span>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
            <div class="md:flex justify-end">
                <button
                    class="bg-primary md:w-auto w-[100%] mb-5 p-4 rounded-md mt-5 text-sm font-bold hover:bg-[#eeac00] hover:text-white">UPDATE
                    PANIER</button>
            </div>
        </div>
        <div class="md:col-span-1 col-span-2 mb-20 mx-auto border-[5px] md:w-[90%] w-[100%] px-6 h-[390px]">
            <div>
                <p class="font-bold pt-3 pb-2 border-b-2 text-lg font-sans">CART TOTAL</p>
            </div>
            <div class="flex justify-between items-center py-5 border-b-[0.05px]">
                <sapn class="text-sm font-bold">SUBTOTAL</sapn>
                <sapn class="font-bold">3500 XAF</sapn>
            </div>
            <div class="flex justify-between py-5 border-b-[0.05px]">
                <sapn class="text-sm font-bold">SHIPPING</sapn>
                <p class="font-sans text-gray-500"></p>
            </div>
            <div class="flex justify-between items-center pt-8">
                <sapn class="text-sm font-bold">TOTAL</sapn>
                <sapn class="text-primary font-bold text-lg">3500 XAF</sapn>
            </div>

            <a href="">
                <button
                    class="w-[100%]  bg-primary hover:bg-[#eeac00] hover:text-white p-3 rounded-md mt-[3rem] mb-8 text-sm font-bold">PROCEDER
                    AU PAYEMENT</button>
            </a>
        </div>
    </div>
<?php else: ?>
    <div class="flex flex-col items-center mt-6 mb-[10rem]">
        <span class="text-[12rem] text-[#999999] "><i class="bi bi-cart-x"></i></span>
        <span class="-mt-12 font-sans text-lg text-gray-900 mb-[4rem]">Votre panier est actuellement vide</span>
        <a href="shop.php"><button class="bg-primary font-[600] text-sm rounded-md hover:text-white p-4">RETOURNER A LA BOUTIQUE</button></a>
    </div>
<?php endif ?>