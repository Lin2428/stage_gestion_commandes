<div class="modal">
    <div class="card-modal">
        <div class="flex justify-between px-[15px] py-[20px] items-center border border-b-1">
            <span class="text-xl font-[600]">SHOPPING CART</span>
            <a href="./home" class="text-sm font-[500]">Close<i class="bi bi-x"></i></a>
        </div>
        <div class="card-modal-body">
            <?php foreach ($produitPanier as $produit): ?>
                <div class="modal-produit">
                   <a href="" class="p-3 text-sm text-gray-400 hover:text-primary"><i class="bi bi-x-circle"></i></a>
                   <a href="#" class="mr-4 bg-gray-100 rounded-3xl"><img class="modal-image" src="<?= image($produit->getImage()) ?>" alt=""></a>
                   <div class="mt-[-1.5rem]">
                        <a href="#" class="text-sm text-gray-700 font-sans hover:text-primary"><?= $produit->getNom() ?></a>
                        <p><span class="text-sm">2</span><span class="text-xs text-gray-400"> x </span><span class="text-primary font-sans text-sm"><?= $produit->getPrix() ?> XAF</span></p>
                   </div>
                </div>
            <?php endforeach ?>
        </div>
        <div class="modal-foot">
            <div class="flex justify-between mb-4">
                <p class="text-lg font-[500]">TOTAL</p>
                <p class="text-lg font-bold">5509 XAF</p>
            </div>
            <button class="bg-primary font-[500] p-3 mb-2 rounded-md w-[100%] hover:text-white">PAYER</button>
            <button class="border font-[500] border-gray-600 p-3 rounded-md w-[100%] hover:text-primary hover:border-primary">VOIR lE PAGNIER</button>
        </div>
    </div>
    <a href="./home" class="desactive-modal"></a>
</div>