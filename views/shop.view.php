<button class="filter-fond">
</button>
    <div class="shop-baner">
        <div>
            <p class="text-bold text-5xl mb-4">Shop</p>
            <span class="px-3 font-sans"><a href="./home" class="text-gray-400 hover:text-primary">Home</a> <span
                    class="font-bold text-xs text-gray-400"><i class="bi bi-chevron-right"></i></span> Shop</span>
        </div>
    </div>
    <br>
    <button class="md:hidden text-sm font-bold mx-7 active-filter-mobile"><i class="bi bi-sliders"></i> FILTRE</button>

    <div class="md:flex md:justify-between">
        <section class="produit">
            <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-4">
                <?php foreach ($produits as $produit): ?>
                    <div class="card">
                        <a href="#">
                            <div class="card-head">
                                <div class="card-links">
                                    <span class="statut">Sale!</span>
                                    <a href="./?favorie=<?= $produit->getId() ?>" class="text-text-<?= $_SESSION['favorie'][$produit->getId()] ? "[#ff0000]" : "gray-400" ?> z-10  hover:text-black"><i
                                            class="bi bi-heart-fill text-xl"></i></a>
                                </div>
                                <img class="card-img" src="<?= base_url('/assets/dist/img/' . $produit->getImage()) ?>"
                                    alt="">
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
                                <a href="./?ajout_panier=<?= $produit->getId() ?>"
                                    class="bg-primary px-3 py-2 w-[2.5rem] hover:text-white rounded-2xl"><i
                                        class="bi bi-basket2-fill"></i></i></a>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </section>

        <div class="filter max-md:hidden">
            <button class="masque-filter md:hidden font-sans text-gray-600 w-[100%] flex justify-end items-center"><span class="text-xs mr-2">MASQUER LE FILTRE </span><span class="text-black"><i class="bi bi-x-lg"></i></span></span></button>
            <div class="filter-category-container">
                <p class="font-bold text-lg p-2">Catégories</p>
                <div class="filter-category">
                    <?php foreach ($categories as $k => $categorie): ?>
                        <div class="categorie-link">
                            <a href=""
                                class="flex items-center w-[100%] hover:text-primary text-sm font-sans text-gray-500">
                                <img class="w-[50px] mr-2" src="<?= image($categorie->getImage()) ?>" alt="">
                                <?= $categorie->getNom() ?>
                            </a>
                            <span class="text-sm font-sans text-gray-500">
                                (<?= $countCategorie[$k]['count'] ?>)
                            </span>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>

            <form method="POST" class="mb-6">
                <div class="relative">
                    <input type="search" id="default-search"
                        class="block w-full p-5 pl-10 text-sm text-gray-600 border border-primary rounded-full outline-none"
                        placeholder="Réchercher un produit..." required>
                    <button type="submit"
                        class="absolute inset-y-0 top-0 right-0 mr-5 flex items-center pl-3 pointer-events-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 font-bold" viewBox="0 0 50 50" width="50px"
                            height="50px">
                            <path
                                d="M 21 3 C 11.601563 3 4 10.601563 4 20 C 4 29.398438 11.601563 37 21 37 C 24.355469 37 27.460938 36.015625 30.09375 34.34375 L 42.375 46.625 L 46.625 42.375 L 34.5 30.28125 C 36.679688 27.421875 38 23.878906 38 20 C 38 10.601563 30.398438 3 21 3 Z M 21 7 C 28.199219 7 34 12.800781 34 20 C 34 27.199219 28.199219 33 21 33 C 13.800781 33 8 27.199219 8 20 C 8 12.800781 13.800781 7 21 7 Z" />
                        </svg>
                    </button>
                </div>
            </form>

            <p class="font-bold text-lg pb-3 mb-5 border-dashed border-b-[0.07px]  border-gray-300">Filtrer par prix</p>
            <form action="" method="GET">
                <?php require 'range.php'; ?>
                <button type="submit" class="py-0.5 px-4 mt-4 text-xs bg-primary rounded-lg font-[700]">FILTRER</button>
            </form>
        </div>
    </div>
<br><br><br>