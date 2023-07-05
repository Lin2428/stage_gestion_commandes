<div class="container p-0">

    <div class="d-flex justify-content-between">
        <h1 class="h2 d-inline align-middle">Modifier le produit</h1>
        <a href="admin/products" class="btn btn-primary mb-4">Liste des produits</a>
    </div>
    <form method="POST" enctype="multipart/form-data">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <?= form_input(label: "Nom", name: "nom", default: $produit['nom']) ?>
                        <?= form_input(label: "Prix", name: "prix", type: "number", default: $produit['prix']) ?>
                        <?= form_input(label: "Image", name: "image", type: "file", default: $produit['image'], required: false) ?>
                        <?php if ($produit['image']) : ?>
                            <div class="image-update-prouit">
                                <img src="<?= base_url('/img/'.$produit['image']) ?>" alt="">
                            </div>
                        <?php endif ?>
                    </div>

                    <div class="col-12 col-lg-6">
                        <?= form_input(label: "Catégorie", name: "category_id", type: "select", options: $categories, default: $produit['categorie_id']) ?>
                        <?= form_input(label: "Stock", name: "stock", type: "number", required: false, default: $produit['stock']) ?>
                        <?= form_input(label: "Description", name: "description", type: "textarea", default: $produit['description']) ?>
                    </div>
                    <div class="col-3 mt-4">
                        <button type="submit" class="btn btn-info">Modifier</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>