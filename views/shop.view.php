<?php
    $message = read_flash_message();
?>

<button class="filter-fond">
</button>
<div class="shop-baner">
    <p class="titre-baner"><?= $shopName ?? "Shop" ?></p>
    <span class="link-baner"><a href="/" class="text-gray-400 hover:text-primary">Home</a>
        <span class="font-bold text-xs text-gray-400"><i class="bi bi-chevron-right"></i></span> <?= $shopName ?? "Shop" ?></span>
</div>
<br>
<?php if ($message) : ?>
    <div class="flex justify-center w-[100%]">
        <div class="alert-succes mb-4"><?= $message ?></div>
    </div>
<?php endif ?>
<br>
<button class="md:hidden text-sm font-bold mx-7 active-filter-mobile"><i class="bi bi-sliders"></i> FILTRE</button>

<div class="md:flex md:justify-between">
    <?php if ($produits) : ?>
        <section class="produit">
            <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-4">
                <?php foreach ($produits as $produit) : ?>
                    <div class="card">
                        <div class="card-head">
                            <div class="card-links">
                                <span class="statut <?= $produit->getStatut() ? 'bg-black' : 'bg-red-400' ?>">
                                    <?= $produit->getStatut() ? 'Disponible !' : 'Indisponible' ?>
                                </span>
                                <form action="/add_produit.php" method="post" class="flex">
                                    <input type="hidden" name="action" value="_add_to_favorie">
                                    <input type="hidden" name="currentPage" value="<?= $_SERVER['REQUEST_URI'] ?>">
                                    <input type="hidden" name="id" value="<?= $produit->getId() ?>">
                                    <button type="submit" class="z-50  hover:text-black <?= $produit->isInFavorite() ? 'in-fav' : 'text-gray-300' ?>">
                                        <i class="bi bi-heart-fill text-xl"></i>
                                    </button>
                                </form>
                            </div>
                            <img class="card-img" src="<?= base_url('/assets/dist/img/' . $produit->getImage()) ?>" alt="">
                            <a class="card-lien-produit" href="/description.php/?id=<?= $produit->getId() ?>"></a>
                        </div>

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
                                <?php if ($produit->getStatut()) : ?>
                                    <form method="post" action="/add_produit.php" style="display: inline;">
                                        <input type="hidden" name="currentPage" value="<?= $_SERVER['PHP_SELF'] ?>">
                                        <input type="hidden" name="action" value="_add_to_cart">
                                        <input type="hidden" name="id" value="<?= $produit->getId() ?>">
                                        <button class="bg-primary px-3 py-2 w-[2.5rem] hover:text-white rounded-2xl transition-all duration-300"><i class="bi bi-basket2-fill"></i></i></button>
                                    </form>
                                <?php else : ?>
                                    <span class="bg-orange-300 px-3 py-2 w-[2.5rem] rounded-2xl"><i class="bi bi-basket2-fill text-gray-400"></i></i></button>
                                    <?php endif ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </section>
    <?php else : ?>
        <div class="flex flex-col items-center md:grow">
            <span class="text-[12rem] text-[#999999]"><i class="bi bi-clipboard-x"></i></span>
            <p class="-mt-12 font-sans text-lg text-gray-900 mb-[4rem]">Aucun produit n'a été trouvé</p>
        </div>
    <?php endif ?>

    <div class="filter max-md:hidden">
        <button class="masque-filter md:hidden font-sans text-gray-600 w-[100%] flex justify-end items-center"><span class="text-xs mr-2">MASQUER LE FILTRE </span><span class="text-black"><i class="bi bi-x-lg"></i></span></span></button>
        <div class="filter-category-container">
            <p class="font-bold text-lg p-2">Catégories</p>
            <div class="filter-category">
                <?php foreach ($categories as $k => $categorie) : ?>
                    <form method="GET" class="px-3 <?= $categorie->isCategory() ? 'active-categorie' : '' ?>">
                        <input type="hidden" name="category" value="<?= $categorie->getId() ?>">
                        <div class="categorie-link">
                            <button class="flex items-center w-[100%] hover:text-primary text-sm font-sans text-gray-500">
                                <img class="w-[50px] mr-2" src="<?= image($categorie->getImage()) ?>" alt="">
                                <?= $categorie->getNom() ?>
                            </button>
                            <span class="text-sm font-sans text-gray-500">
                                (<?= $countCategorie[$k]['count'] ?>)
                            </span>
                        </div>
                    </form>
                <?php endforeach ?>
            </div>
        </div>

        <form action="" method="GET">
            <input type="hidden" name="category" value="<?= $_GET['category'] ?? '' ?>">
            <div class="mb-6">
                <div class="relative">
                    <input type="search" name="nom" value="<?= $_GET['nom'] ?? '' ?>" id="default-search" class="block w-full p-5 pl-10 text-sm text-gray-600 border border-primary rounded-full outline-none" placeholder="Réchercher un produit...">
                    <button type="submit" class="absolute inset-y-0 top-0 right-0 mr-5 flex items-center pl-3 pointer-events-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 font-bold" viewBox="0 0 50 50" width="50px" height="50px">
                            <path d="M 21 3 C 11.601563 3 4 10.601563 4 20 C 4 29.398438 11.601563 37 21 37 C 24.355469 37 27.460938 36.015625 30.09375 34.34375 L 42.375 46.625 L 46.625 42.375 L 34.5 30.28125 C 36.679688 27.421875 38 23.878906 38 20 C 38 10.601563 30.398438 3 21 3 Z M 21 7 C 28.199219 7 34 12.800781 34 20 C 34 27.199219 28.199219 33 21 33 C 13.800781 33 8 27.199219 8 20 C 8 12.800781 13.800781 7 21 7 Z" />
                        </svg>
                    </button>
                </div>
            </div>

            <p class="font-bold text-lg pb-3 mb-5 border-dashed border-b-[0.07px]  border-gray-300">Filtrer par prix</p>
            <div>
                <?php require 'range.php'; ?>
                <button type="submit" class="py-0.5 px-4 mt-4 text-xs bg-primary rounded-lg hover:text-white font-[700] transition-all duration-300">FILTRER</button>
            </div>
        </form>
        <form method="GET"><button type="submit" class="bg-primary p-4 mt-10 rounded-md hover:text-white w-[100%] font-bold text-xs transition-all duration-300">TOUT LES PRODUITS</button></form>
    </div>
</div>
<br><br><br>