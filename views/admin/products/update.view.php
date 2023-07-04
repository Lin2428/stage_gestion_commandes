<div class="container p-0">

    <div class="d-flex justify-content-between">
        <h1 class="h2 d-inline align-middle">Modifier le produit</h1>
        <a href="admin/products" class="btn btn-primary mb-4">Liste des produits</a>
    </div>
    <form method="POST">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <?= form_input(label: "Nom", name: "nom", default: $produit['nom']) ?>
                        <?= form_input(label: "Prix", name: "prix", type: "number", default: $produit['prix']) ?>
                    </div>

                    <div class="col-12 col-lg-6">
                    <h5 class="card-title mt-3">Catégorie</h5>
                        <select class="form-select mb-3" name="category">
                            <option value="<?= $categorieActuel['id']?>"><?= $categorieActuel['nom']?></option>
                            <?php foreach($category as $categorie): ?>
                            <option value="<?= $categorie['id'] ?>"><?= $categorie['nom'] ?></option>
                            <?php endforeach ?>
                        </select>
                        <?= form_input(label: "Stock", name: "stock", type: "number", required: false, default: $produit['stock']) ?>
                    </div>
                    <div class="col-12">
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