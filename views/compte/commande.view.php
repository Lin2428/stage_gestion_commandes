<div class="shop-baner-client">
    <p class="titre-baner">Mon compte</p>
    <span class="link-baner"><a href="/" class="text-gray-400 hover:text-primary">Home</a>
        <span class="font-bold text-xs text-gray-400"><i class="bi bi-chevron-right"></i></span> Mon compte</span>
</div>


<div class="grid grid-cols-3 mb-20 relative">
    <div class="col-span-1">
        <?php require 'compte-sidebar.php' ?>
    </div>



    <div class="flex flex-col col-span-2 mr-3">
        <p class="text-xl font-bold py-6 border-b-[0.05px]">Mes commandes</p>
        <form action="" class="md:flex justify-between items-center mt-2 mb-4">
            <label for="category" class="font-[700] text-sm">Filtrer: </label>
            <div class="flex justify-between items-center overflow-auto md:w-[560px]">
                <div><input type="checkbox" name="passer" id="passer"> <label for="passer" class="text-sm"> Passée</label></div>
                <div><input type="checkbox" name="traiter" id="traiter"> <label for="traiter" class="text-sm"> Traitée</label></div>
                <div><input type="checkbox" name="livraison" id="livraison"> <label for="livraison" class="text-sm"> Livraison</label></div>
                <div><input type="checkbox" name="livrer" id="livrer"><label for="livrer" class="text-sm"> Livrée</label></div>
                <div><input type="checkbox" name="annuler" id="annuler"><label for="annuler" class="text-sm"> Annulée</label></div>
            </div>
            <div><button class="py-1 px-2 rounded-md bg-primary text-white hover:bg-primary_hover transition-all duration-300"><i class="bi bi-search"></i></button></div>
        </form>

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
</div>