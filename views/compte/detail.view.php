<div class="shop-baner-client">
    <p class="titre-baner">Mon compte</p>
    <span class="link-baner"><a href="/" class="text-gray-400 hover:text-primary">Home</a>
        <span class="font-bold text-xs text-gray-400"><i class="bi bi-chevron-right"></i></span> Mon compte</span>
</div>


<div class="compte-content">
    <div class="compte-grid ">
        <?php require 'compte-sidebar.php' ?>

        <div class="compte-grid-2">
            <p class="text-xl font-bold py-4 border-b-[0.05px]">Détails de la commande</p>
            <div class="compte-commande">
                <div class="flex justify-between items-center">
                    <span class="text-sm"><span class="font-[600]">Numéro: </span><?= $commande->getNumero() ?></span>
                    <span class="text-sm"><span class="font-[600]">Date: </span><?= $commande->getCreatedAt() ?></span>
                </div>
                <span class="commande-bage"><?= $commande->getStatut() ?></span>
                <div class="hidden md:grid grid-cols-4 items-center mt-3">
                        <span class="text-sm font-[600]">Produit</span>
                        <span class="text-sm font-[600]">Quantité</span>
                        <span class="text-sm font-[600]">Prix</span>
                        <span class="text-sm font-[600]">Prix total</span>
                        <?php foreach ($produits as $produit) : ?>
                            <span class="border-t-[0.05px] text-sm py-2"><?= $produit->getNomProduit() ?></span>
                            <span class="border-t-[0.05px] text-sm py-2"><?= $produit->getQuantite() ?></span>
                            <span class="border-t-[0.05px] text-sm py-2"><?= $produit->getPrix() ?> XAF</span>
                            <span class="border-t-[0.05px] text-sm py-2"><?= $produit->getTotal() ?>XAF</span>
                        <?php endforeach ?>
                        <div class=" flex justify-between border-t-[0.05px] text-sm py-2 col-span-4">
                            <span class="font-[600]">Total</span>
                            <span class="font-[600]"><?= $commande->getTotalPrix() ?> XAF</span>
                        </div>
                    </div>

                    <!-- DETAILS COMMANDE MOBILE -->
                    <div class="md:hidden grid-cols-2 items-center mt-3">
                        <?php foreach ($produits as $produit) : ?>
                            <div>
                                <div class="flex justify-between items-center border-t-[0.05px]">
                                    <p class="text-sm font-[600]">Produit</p>
                                    <span class="text-sm py-2"><?= $produit->getNomProduit() ?></span>
                                </div>
                                <div class="flex justify-between items-center ">
                                    <p class="text-sm font-[600]">Quantité</p>
                                    <span class="text-sm py-2 "><?= $produit->getQuantite() ?></span>
                                </div>
                                <div class="flex justify-between items-center ">
                                    <p class="text-sm font-[600]">Prix</p>
                                    <span class="text-sm py-2"><?= $produit->getPrix() ?> XAF</span>
                                </div>
                                <div class="flex justify-between items-center border-t-[0.05px]">
                                    <p class="text-sm font-[600]">Prix total</p>
                                    <span class=" text-sm py-2 font-bold"><?= $produit->getTotal() ?>XAF</span>
                                </div>
                            </div>
                        <?php endforeach ?>
                        <div class=" flex justify-between border-t-[0.05px] text-sm py-2 col-span-4">
                            <span class="font-[600]">Total</span>
                            <span class="font-[600]"><?= $commande->getTotalPrix() ?> XAF</span>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>