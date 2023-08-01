<div class="shop-baner">
    <p class="titre-baner">Créer un compte</p>
    <span class="link-baner"><a href="/" class="text-gray-400 hover:text-primary">Home</a>
        <span class="font-bold text-xs text-gray-400"><i class="bi bi-chevron-right"></i></span> Créer un compte</span>
</div>


<div class="flex flex-col items-center justify-center h-[100%] mb-6">
    <form class="form-client" method="POST">
        <p class="mt-14 font-bold">Créer un compte</p>
        <div class="md:flex justify-between ">
            <div class="md:mr-3">
                <?= input_client(name: "nom", label: "Nom") ?>
                <?= input_client(name: "prenom", label: "Prénom", required: false) ?>
                <?= input_client(name: "email", label: "Email", type: "email", required: false) ?>
            </div>
            <div class="md:ml-3">
                <?= input_client(name: "tel", label: "Téléphone", type: "number") ?>
                <?= input_client(name: "password", label: "Mot de passe", type: "password") ?>
                
            </div>
        </div>
        <button class="w-[100%] bg-primary p-4 mt-3 mb-10 rounded-md hover:text-white font-bold">Créer le compte</button>
    </form>

    <div class="flex justify-between mt-4 w-[35%]">
        <a href="create.php" class="text-gray-500 font-sans border-dashed border-b-2 hover:text-primary">Créer plus tard</a>
        <a href="" class="text-gray-500 font-sans border-dashed border-b-2 hover:text-primary">Se connecter</a>
    </div>
</div>