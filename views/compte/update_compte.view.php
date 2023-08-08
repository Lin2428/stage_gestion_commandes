<div class="shop-baner-client">
    <p class="titre-baner">Mon compte</p>
    <span class="link-baner"><a href="/" class="text-gray-400 hover:text-primary">Home</a>
        <span class="font-bold text-xs text-gray-400"><i class="bi bi-chevron-right"></i></span> Mon compte</span>
</div>

<div class="grid grid-cols-3 mb-20 relative ">
    <div class="col-span-1">
        <?php require 'compte-sidebar.php' ?>
    </div>



    <div class="flex flex-col col-span-2">
        <?php if ($userExiste) : ?>
            <div class="flex flex-col justify-center">
                <div class="alert-danger"><?= read_flash_message() ?></div>
            </div>
        <?php endif ?>

        <?php if (!$create) : ?>
            <div class=" h-[100%] mb-6 max-w-[470px]">
                <form class="form-client" method="POST">
                    <p class=" font-bold">Modifier le compte</p>
                    <?= input_client(name: "nom", label: "Nom", default: $client->getNom()) ?>
                    <?= input_client(name: "prenom", label: "Prénom", required: false, default: $client->getPrenom()) ?>
                    <?= input_client(name: "email", label: "Email", type: "email", required: false, default: $client->getEmail()) ?>
                    <?= input_client(name: "tel", label: "Téléphone", type: "number", default: $client->getTel()) ?>
                    <button class="w-[100%] bg-primary p-4 mt-3  rounded-md transition-all duration-300 hover:text-white font-bold">Modifier</button>
                </form>
            </div>
        <?php endif ?>
    </div>