<div class="container p-0">

    <div class="d-flex justify-content-between">
        <h1 class="h2 d-inline align-middle">Modifier le produit</h1>
        <a href="/admin/produits" class="btn btn-primary mb-4">Liste des produits</a>
    </div>
    <form method="POST" enctype="multipart/form-data">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <?php foreach ($produit as $product) :?>
                    <div class="col-12 col-lg-6">
                        <?= form_input(label: "Nom", name: "nom", default: $product->getNom()) ?>
                        <?= form_input(label: "Prix", name: "prix", type: "number", default: $product->getPrix()) ?>
                        <?= form_input(label: "Image", name: "image", type: "file", required: false) ?>
                        <?php if ($product->getImage()) : ?>
                            <div class="image-update-prouit">
                                <img src="<?= image($product->getImage()) ?>" alt="">
                            </div>
                        <?php endif ?>
                    </div>

                    <div class="col-12 col-lg-6">
                        <?= form_input(label: "Catégorie", name: "category_id", type: "select", options: $categories, default: $product->getCategoryId()) ?>
                        <?= form_input(label: "Stock", name: "stock", type: "number", required: false, default: $product->getStock()) ?>
                        <?= form_input(label: "Description", name: "description", type: "textarea", default: $product->getDescription()) ?>
                    </div>
                    <?php endforeach ?>
                    <div class="col-3 mt-4">
                        <button type="submit" class="btn btn-info">Modifier</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>