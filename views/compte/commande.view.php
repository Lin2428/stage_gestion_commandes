<div class="shop-baner-client">
    <p class="titre-baner">Mon compte</p>
    <span class="link-baner"><a href="/" class="text-gray-400 hover:text-primary">Home</a>
        <span class="font-bold text-xs text-gray-400"><i class="bi bi-chevron-right"></i></span> Mon compte</span>
</div>


<div class="compte-content">
    <div class="compte-grid ">
        <?php require 'compte-sidebar.php' ?>

        <div class="compte-grid-2">
            <p class="text-xl font-bold py-4 border-b-[0.05px]">Mes commandes</p>
            <form method="GET" class="md:flex  items-center mt-2 mb-4">
                <label for="category" class="font-[700] text-sm md:mr-10">Filtrer: </label>
                <div class="flex justify-between items-center overflow-auto md:w-[560px]">
                    <button><?= checkbox(name:"passer", label: "Passée") ?></button>
                    <button><?= checkbox(name:"traiter", label: "Traitée") ?></button>
                    <button><?= checkbox(name:"livraison", label: "Livraison") ?></button>
                    <button><?= checkbox(name:"livrer", label: "Livrée") ?></button>
                    <button><?= checkbox(name:"annuler", label: "Annulée") ?></button>
                </div>
            </form>

            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left">
                    <thead class="font-[600] text-sm">
                        <tr>
                            <th scope="col" class="py-3">
                                Numéro
                            </th>
                            <th scope="col" class="py-3">
                                Statut
                            </th>
                            <th scope="col" class="py-3">
                                Total
                            </th>
                            <th scope="col" class="py-3">
                                Date
                            </th>
                            <th scope="col" class="py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach ($commandes as $k => $commande) : ?>





                            <tr class="text-sm">
                                <th scope="row" class="font-medium text-sm border-t-[0.05px]">
                                    <?= $commande->getNumero() ?>
                                </th>
                                <td class="py-4 border-t-[0.05px]">
                                    <span class="commande-bage"><?= $commande->getStatut() ?></span>
                                </td>
                                <td class="py-4 border-t-[0.05px] font-bold">
                                    <?= $commande->getTotalPrix() ?> XAF
                                </td>
                                <td class="py-4 border-t-[0.05px]">
                                    <?= $commande->getCreatedAt() ?>
                                </td>
                                <td class="py-4 border-t-[0.05px]">
                                    <form action="/detail.php" method="post">
                                        <input type="hidden" name="id" value="<?= $commande->getId() ?>">
                                        <button class="btn bg-primary hover:bg-primary_hover hover:text-white">Détails</button>
                                    </form>
                                </td>
                            </tr>

                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>