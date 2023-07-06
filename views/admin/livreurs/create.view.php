<div class="container p-0">

    <div class="d-flex justify-content-between">
        <h1 class="h2 d-inline align-middle">Ajouter un Livreur</h1>
        <a href="admin/livreurs" class="btn btn-primary mb-4">Liste des livreurs</a>
    </div>
    <form method="POST" enctype="multipart/form-data">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <?= form_input(label: "Nom", name: "nom") ?>
                        <?= form_input(label: "Prénom", name: "prenom") ?>
                        <?= form_input(label: "Photo", name: "image", type: "file", required: false) ?>
                    </div>

                    <div class="col-12 col-lg-6">
                        <?= form_input(label: "Email", name: "email", type: "email") ?>
                        <?= form_input(label: "Télephone", name: "tel", type: "number") ?>
                        <?= form_input(label: "Mot de passe", name: "password", type: "passeword") ?>
                    </div>
                    <div class="col-3 mt-4">
                        <button type="submit" class="btn btn-info">Ajouter</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>