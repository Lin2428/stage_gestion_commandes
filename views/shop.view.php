<div class="flex justify-between">
    <section class="produit">
        <div class="grid grid-cols-2 max-sm:grid-cols-1 xl:grid-cols-3 gap-4">
            <?php foreach ($produits as $produit): ?>
                <div class="card">
                    <a href="#">
                        <div class="card-head">
                            <div class="card-links">
                                <span class="statut">Sale!</span>
                                <a href="#" class="text-gray-200 z-10  hover:text-black"><i
                                        class="bi bi-heart-fill text-xl"></i></a>
                            </div>
                            <img class="card-img" src="<?= base_url('/assets/dist/img/' . $produit->getImage()) ?>" alt="">
                            <a class="card-lien-produit" href="description.php/?id=<?= $produit->getId() ?>"></a>
                        </div>
                    </a>
                    <div class="card-body">
                        <div class="star flex">
                            <span class="text-yellow-500"><i class="bi bi-star-fill"></i></i></span>
                            <span class="text-yellow-500"><i class="bi bi-star-fill"></i></i></span>
                            <span class="text-yellow-500"><i class="bi bi-star-fill"></i></i></span>
                            <span class="text-gray-200"><i class="bi bi-star"></i></span>
                            <span class="text-gray-200"><i class="bi bi-star"></i></span>
                        </div>
                        <a href="description.php/?id=<?= $produit->getId() ?>" class="font-bold hover:text-primary">
                            <?= $produit->getNom() ?>
                        </a>
                        <p class="desc">
                            <?= $produit->getDescription() ?>
                        </p>
                        <div class="card-footer">
                            <span class="prix-produit text-primary font-bold text-lg">
                                <?= $produit->getPrix() ?> XAF
                            </span>
                            <a href="./?ajout=<?= $produit->getId() ?>"
                                class="bg-primary px-3 py-2 w-[2.5rem] hover:text-white rounded-2xl"><i
                                    class="bi bi-basket2-fill"></i></i></a>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </section>

    <div class="filter">
        <div class="filter-category-container">
            <p class="font-bold text-lg p-2">Catégories</p>
            <div class="filter-category">
                <?php foreach ($categories as $categorie): ?>
                    <a href="" class="flex p-1 items-center justify-between border-dotted border-b-2  border-gray-300 hover:text-primary">
                        <img class="w-[50px]" src="<?= image($categorie->getImage()) ?>" alt="">
                        <span class="text-sm font-sans text-gray-500 hover:text-primary">
                            <?= $categorie->getNom() ?>
                        </span>
                    </a>
                <?php endforeach ?>
            </div>
        </div>
            
        <form action="" method="POST">
            <input type="search" name="search" placeholder="Récherher un produit..." class="outline-none border border-1 border-primary w-[100%] p-5 rounded-full font-sans text-gray-500 mb-10">
            
            <p class="font-bold text-lg pb-3 mb-5 border-dotted border-b-2  border-gray-300">Filtrer par prix</p>
            <input type="range" min="500" max="10000" class="w-[100%] bg-primary">
            <span class="font-sans text-gray-600 mb-6">Prix: 500 - 10,000XAF</span><br>
            <button type="submit" class="py-0.5 px-4 mt-4 text-sm bg-primary rounded-lg">Filtrer</button>
        </form>

    </div>
</div>
<br><br><br>