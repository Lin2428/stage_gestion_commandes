<div class="shop-baner">
    <p class="titre-baner">Validation</p>
    <span class="link-baner"><a href="/" class="text-gray-400 hover:text-primary">Home</a>
        <span class="font-bold text-xs text-gray-400"><i class="bi bi-chevron-right"></i></span> Validaton</span>
</div>

<?php if (!empty($panier)) : ?>
    <div class="flex flex-col items-center mx-3  mt-10 md:mb-5 mb-[10rem]">
        <form method="POST">
            <div class="w-[100%] flex justify-center"><?= input_client(name: 'adresse', label: 'Adresse') ?></div>
            <div class="md:w-[500px] my-14 mx-auto border-[5px] w-[300px] px-6">
                <div>
                    <p class="font-bold pt-6 pb-2 text-xl">Vos produits</p>
                </div>
                <div class="flex justify-between items-center py-5 border-b-[0.05px]">
                    <sapn class="text-sm font-bold">Produit</sapn>
                    <sapn class="text-sm font-bold">
                        Prix total
                    </sapn>
                </div>
                <?php foreach ($panier as $produit) : ?>
                    <div class="flex justify-between py-5 border-b-[0.05px]">
                        <p class="font-sans text-gray-600"><?= $produit->getProduitNom() ?> <span class="font-[450] text-sm"> <i class="bi bi-x"></i> <?= $produit->getQuantite() ?></span></p>
                        <sapn class="text-sm font-bold"><?= $produit->getTotal() ?> XAF</sapn>
                    </div>
                <?php endforeach ?>
                <div class="flex justify-between items-center pt-8 mb-4">
                    <sapn class="text-sm font-bold">TOTAL</sapn>
                    <sapn class="text-primary font-bold text-lg">
                        <?= $total ?> XAF
                    </sapn>
                </div>
                <div class="flex justify-start py-5 border-b-[0.05px]">
                    <input type="radio" name="payement" id="livraison" value="livraison" required>
                    <label for="livraison" class="ml-3 text-sm font-bold">Payement à la livraison</label>
                </div>
                <div class="flex justify-start py-5 border-b-[0.05px]">
                    <input type="radio" name="payement" id="moble" value="mobile" required>
                    <label for="moble" class="ml-3 text-sm font-bold">Payement par Momo</label>
                </div>
                <button class="w-[100%]  bg-primary hover:bg-primary_hover hover:text-white p-3 rounded-md mt-[3rem] mb-8 text-sm font-bold transition-all duration-300">PROCEDER AU PAYEMENT</button>
            </div>
        </form>
    </div>

<?php endif ?>