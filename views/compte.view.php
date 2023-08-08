<div class="shop-baner-client">
    <p class="titre-baner">Mon compte</p>
    <span class="link-baner"><a href="/" class="text-gray-400 hover:text-primary">Home</a>
        <span class="font-bold text-xs text-gray-400"><i class="bi bi-chevron-right"></i></span> Mon compte</span>
</div>

<div class="grid grid-cols-3 mb-20 relative ">
    <div class="col-span-1">
        <?php require 'compte/compte-sidebar.php' ?>
    </div>



    <div class="flex flex-col col-span-2 md:mr-20 my-10">
        <div class="border rounded-md">
            <p class="text-xl font-bold px-3 py-6">Tableau de bord</p>
            <div class="flex justify-between items-center px-6 border-t-[0.05px]">
                <span class="font-[600] text-sm py-2">Nombre des commandes</span>
                <span class="font-[600] text-sm py-2">10</span>
            </div>
            <div class="flex justify-between items-center px-6 border-t-[0.05px]">
                <span class="font-[600] text-sm py-2">Commandes en attentes</span>
                <span class="font-[600] text-sm py-2">1</span>
            </div>
            <div class="flex justify-between items-center px-6 border-t-[0.05px]">
                <span class="font-[600] text-sm py-2">Commandes livrées</span>
                <span class="font-[600] text-sm py-2">8</span>
            </div>
            <div class="flex justify-between items-center px-6 border-t-[0.05px]">
                <span class="font-[600] text-sm py-2">Commandes annulées</span>
                <span class="font-[600] text-sm py-2">1</span>
            </div>
        </div>

        <p class="text-xl font-bold py-6 border-b-[0.05px]">Commande en attentes</p>
        <?php foreach ($commandes as $k => $commande) : ?>
            <div class="compte-commande">
                <div class="flex justify-between items-center">
                    <span class="text-sm"><span class="font-[600]">Numéro: </span><?= $commande->getNumero() ?></span>
                    <span class="text-sm"><span class="font-[600]">Date: </span><?= $commande->getCreatedAt() ?></span>
                </div>
                <span class="commande-bage"><?= $commande->getStatut() ?></span>
                <div class="grid grid-cols-4 items-center mt-3">
                    <span class="text-sm font-[600]">Produit</span>
                    <span class="text-sm font-[600]">Quantité</span>
                    <span class="text-sm font-[600]">Prix</span>
                    <span class="text-sm font-[600]">Prix total</span>
                    <?php foreach ($produits[$k] as $produit) : ?>
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
            </div>
        <?php endforeach ?>

    </div>
</div>