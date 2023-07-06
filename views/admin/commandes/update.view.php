<div class="container p-0">

    <div class="d-flex justify-content-between">
        <h1 class="h2 d-inline align-middle">Changer le livreur</h1>
        <a href="admin/commandes" class="btn btn-primary mb-4">Liste des commandes</a>
    </div>
    <form method="POST" enctype="multipart/form-data">
        <div class="card">
            <div class="card-body">
                <p>Numéro de la commande: <strong> <?= $commande['numero'] ?></strong></p>
                <div class="form-group">
                    <?= form_input(label: "Livreur", name: "livreur_id", type: "select", options: $livreurs, default: $commande['id_livreur']) ?>
                    <button type="submit" class="btn btn-info">Modifier</button>
                </div>
            </div>
        </div>
    </form>
</div>