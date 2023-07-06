<div class="d-flex justify-content-between mb-4">
    <h1 class="h2">Liste des clients</h1>
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-responsive table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Tél</th>
                    <th>Inscription</th>
                    <th>Edition</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($clients as $client) : ?>
                    <tr>
                        <td><?= $client['id'] ?></td>
                        <td><?= $client['nom'] ?></td>
                        <td><?= $client['prenom'] ?></td>
                        <td><?= $client['email'] ?></td>
                        <td><?= $client['tel'] ?></td>
                        <td><?= $client['created_at'] ?></td>
                        <td><?= $client['updated_at'] ?></td>
                        <td>
                            <form action="<?= base_url('/admin/clients/delete.php') ?>" method="POST" class="d-inline">
                                <input type="hidden" name="id" value="<?= $client['id'] ?>">
                                <button type="submit" class="btn btn-danger btn-sm ">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>