<div class="shop-baner-client">
    <p class="titre-baner">Mon compte</p>
    <span class="link-baner"><a href="/" class="text-gray-400 hover:text-primary">Home</a>
        <span class="font-bold text-xs text-gray-400"><i class="bi bi-chevron-right"></i></span> Mon compte</span>
</div>

<div class="compte-content">
    <div class="compte-grid ">
        <?php require 'compte-sidebar.php' ?>

        <div class="compte-grid-2 justify-center md:items-center">
            <?php if ($message) : ?>
                <div class="alert-succes mb-4"><?= read_flash_message() ?></div>
            <?php endif ?>
            <div class=" h-[100%] mb-6 max-w-[470px]">
                <form class="form-compte" method="POST">
                    <p class=" font-bold">Modifier le mot de passe</p>
                    <?= input_client(name: "password", label: "Mot de passe", type: "password") ?>
                    <?= input_client(name: "cpassword", label: "Confirmer", type: "password") ?>
                    <button class="w-[100%] bg-primary p-4 mt-3  rounded-md transition-all duration-300 hover:text-white font-bold">Modifier</button>
                </form>
            </div>
        </div>
    </div>