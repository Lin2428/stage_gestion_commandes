<div class="shop-baner">
    <p class="titre-baner">Créer un compte</p>
    <span class="link-baner"><a href="/" class="text-gray-400 hover:text-primary">Home</a>
        <span class="font-bold text-xs text-gray-400"><i class="bi bi-chevron-right"></i></span> Créer un compte</span>
</div>

<?php if ($userExiste) : ?>
    <div class="flex flex-col justify-center items-center">
        <div class="alert-danger"><?= read_flash_message() ?></div>
    </div>
<?php endif ?>

<?php if (!$create) : ?>
    <div class="flex flex-col items-center justify-center h-[100%] mb-6">
        <div>
            <form class="form-client" method="POST">
                <p class=" font-bold">Créer un compte</p>
                        <?= input_client(name: "nom", label: "Nom") ?>
                        <?= input_client(name: "prenom", label: "Prénom", required: false) ?>
                        <?= input_client(name: "email", label: "Email", type: "email", required: false) ?>
                        <?= input_client(name: "tel", label: "Téléphone", type: "number") ?>
                        <?= input_client(name: "password", label: "Mot de passe", type: "password") ?>
                        <?= input_client(name: "cpassword", label: "Confirmer le mot de passe", type: "password") ?>
                <button class="w-[100%] bg-primary p-4 mt-3  rounded-md transition-all duration-300 hover:text-white font-bold">Créer le compte</button>
            </form>

            <div class="flex justify-between mt-4 mb-[10rem]">
                <a href="/" class="text-gray-500 font-sans border-dashed border-b-2 hover:text-primary">Créer plus tard</a><br>
                <a href="/login.php" class="text-gray-500 ml-2 font-sans border-dashed border-b-2 hover:text-primary">Se connecter</a>
            </div>
        </div>
    </div>
<?php else : ?>
    <div class="flex flex-col justify-center items-center">
        <div class="alert-succes"><?= read_flash_message() ?></div>
        <a href="/login.php" class="w-[15%] mt-4"><button class=" bg-primary w-[100%] p-4 mt-3 mb-10  rounded-md hover:text-white font-bold">Se connecter</button></a>
    </div>

<?php endif ?>

<span class="form-label-client form-input-client border-error hidden"></span>