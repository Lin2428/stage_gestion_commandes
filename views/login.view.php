<div class="shop-baner">
    <p class="titre-baner">Se connecter</p>
    <span class="link-baner"><a href="/" class="text-gray-400 hover:text-primary">Home</a>
        <span class="font-bold text-xs text-gray-400"><i class="bi bi-chevron-right"></i></span> Se connecter</span>
</div>

<?php if ($error) : ?>
    <div class="flex flex-col justify-center items-center ">
        <div class="alert-danger"><?= read_flash_message() ?></div>
    </div>
<?php endif ?>

<div class="flex flex-col items-center justify-center h-[100%] md:mb-6 mb-[10rem]">
    <form method="POST" class="form-client ">
        <p class="font-bold">Login</p>
        <div class="md:mt-4 mb-2">
            <?= input_client(name: "login", label: "Login",) ?>
        </div>
        <div class="md:mt-4">
            <?= input_client(name: "password", label: "Mot de passe", type: "password") ?>
        </div>
        <button class="w-[100%] bg-primary p-4 mt-3 rounded-md hover:text-white font-bold">Connexion</button>
    </form>

    <div class=" md:flex  md:justify-between justify-center mt-4 md:w-[35%]">
        <a href="create.php" class="text-gray-500 md:ml-0 ml-3 font-sans border-dashed border-b-2 hover:text-primary">Créer un compte</a><br>
        <a href="" class="text-gray-500 font-sans border-dashed border-b-2 hover:text-primary">Mot de passe oublié</a>
    </div>
</div>