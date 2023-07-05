<div class="container p-0">

    <div class="d-flex justify-content-between">
        <h1 class="h2 d-inline align-middle">Ajouter un produit</h1>
        <a href="admin/products" class="btn btn-primary mb-4">Liste des produits</a>
    </div>
    <form method="POST" enctype="multipart/form-data">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <?= form_input(label: "Nom", name: "nom") ?>
                        <?= form_input(label: "Prix", name: "prix", type: "number") ?>
                        <?= form_input(label: "Description", name: "description", type: "textarea") ?>
                    </div>

                    <div class="col-12 col-lg-6">
                        <?= form_input(label: "Catégorie", name: "category_id", type: "select", options: $categories) ?>
                        <?= form_input(label: "Stock", name: "stock", type: "number", required: false) ?>
                        <?= form_input(label: "Image", name: "image", type: "file", required: false) ?>
                    </div>
                    <div class="col-3 mt-4">
                        <button type="submit" class="btn btn-info">Ajouter</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>