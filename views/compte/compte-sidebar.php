<div class="card-profil">
    <div class="border-b-[0.05px] p-4">
        <p class="text-lg font-bold -mb-3"><?= $client->getNom() ?> <?= $client->getPrenom() ?></p>
        <span class="text-xs"><?= $client->getEmail() ?> | <?= $client->getTel() ?></span>
    </div>
    <a href="/compte.php" class="profil-link <?= is_active_client('compte') ?>">
        <span class="profil-ligne"><i class="bi bi-speedometer2 text-lg"></i> Tableau de bord</span>
    </a>
    <a href="/profil.php" class="profil-link <?= is_active_client('profil') ?>">
        <span class="profil-ligne"><i class="bi bi-person-vcard text-lg"></i> Profil</span>
    </a>
    <a href="/commande.php" class="profil-link <?= is_active_client('commande') ?>">
        <span class="profil-ligne"><i class="bi bi-bag text-lg"></i> Mes commandes</span>
    </a>
    <a href="/update_compte.php"  class="profil-link <?= is_active_client('update_compte') ?>">
         <span class="profil-ligne"><i class="bi bi-person-gear text-lg"></i> Modifier le compte</span>
    </a>
    <a href="/update_password.php" class="profil-link <?= is_active_client('update_password') ?>">
        <span class="profil-ligne"><i class="bi bi-key text-lg"></i> Mot de passe</span>
    </a>
    <a href="/logout.php" class="profil-link">
        <span class="profil-ligne"><i class="bi bi-box-arrow-left text-lg"></i> Deconnexion</span>
    </a>
</div>
<span class="form-label-client form-input-client border-error active-link hidden"></span>