<div class="container p-0">

    <div class="d-flex justify-content-between">
        <h1 class="h2 d-inline align-middle">Ajouter une catégorie</h1>
        <a href="admin/categories/" class="btn btn-primary mb-4">Liste des catégories</a>
    </div>
    <form method="POST" enctype="multipart/form-data">
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <?= form_input(label: "Nom", name: "nom", default: $categorie[0]->getNom()) ?>
                    <button type="submit" class="btn btn-info">Modifier</button>
                </div>
            </div>
        </div>
    </form>
</div>