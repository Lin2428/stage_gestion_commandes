<div class="container p-0">

    <div class="d-flex justify-content-between">
        <h1 class="h2 d-inline align-middle">Ajouter un compte administrateur</h1>
    </div>
    <form method="POST" enctype="multipart/form-data">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <?= form_input(label: "Email", name: "email", type: "email") ?>
                    </div>

                    <div class="col-12 col-lg-6">
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