<div class="shop-baner-client">
    <p class="titre-baner">Mon compte</p>
    <span class="link-baner"><a href="/" class="text-gray-400 hover:text-primary">Home</a>
        <span class="font-bold text-xs text-gray-400"><i class="bi bi-chevron-right"></i></span> Mon compte</span>
</div>

<div class="grid grid-cols-3 mb-20 relative ">
    <div class="col-span-1">
        <?php require 'compte-sidebar.php' ?>
    </div>



    <div class="flex flex-col col-span-2 md:mr-20 my-10">
        <div class="border rounded-md">
            <p class="text-xl font-bold px-3 py-6">Information du compte</p>
            <div class="flex justify-between items-center px-6 border-t-[0.05px]">
                <span class="font-[600] text-sm py-2">Nom</span>
                <span class="font-[600] text-sm py-2"><?= $client->getNom() ?></span>
            </div>
            <div class="flex justify-between items-center px-6 border-t-[0.05px]">
                <span class="font-[600] text-sm py-2">Prénom</span>
                <span class="font-[600] text-sm py-2"><?= $client->getPrenom() ?></span>
            </div>
            <div class="flex justify-between items-center px-6 border-t-[0.05px]">
                <span class="font-[600] text-sm py-2">Email</span>
                <span class="font-[600] text-sm py-2"><?= $client->getEmail() ?></span>
            </div>
            <div class="flex justify-between items-center px-6 border-t-[0.05px]">
                <span class="font-[600] text-sm py-2">Téléphone</span>
                <span class="font-[600] text-sm py-2"><?= $client->getTel() ?></span>
            </div>
        </div>

    </div>
</div>