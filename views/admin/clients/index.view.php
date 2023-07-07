<div class="d-flex justify-content-between mb-4">
    <h1 class="h2">Liste des clients</h1>
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-responsive" style="width:100%">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Tél</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($clients as $client) : ?>
                    <tr>
                        <td><?= $client->getNom() ?></td>
                        <td><?= $client->getPrenom() ?></td>
                        <td><?= $client->getEmail() ?></td>
                        <td><?= $client->getTel() ?></td>
                        <td>
                            <form action="<?= base_url('/admin/clients/delete.php') ?>" method="POST" class="d-inline">
                                <input type="hidden" name="id" value="<?= $client->getId() ?>">
                                <button type="submit" class="btn btn-warning btn-sm ">Désactiver</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>