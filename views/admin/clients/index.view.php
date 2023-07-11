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
                    <th>Statut</th>
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
                        <td><?php if ($client->getStatut() === 0) : ?>
                                <span class=" badge bg-warning">Inactif</span>
                            <?php else : ?>
                                <span class=" badge bg-success">Actif</span>
                            <?php endif ?>
                        </td>
                        <td>
                            <form action="<?= base_url('/admin/clients/delete.php') ?>" method="POST" class="d-inline">
                                <input type="hidden" name="id" value="<?= $client->getId() ?>">
                                <?php if ($client->getStatut() === 1) : ?>
                                    <?php $class = "btn-danger" ?>
                                    <?php else : ?>
                                    <?php $class = "btn-success" ?>
                                <?php endif ?>

                                <button type="submit" class="btn <?= $class ?> btn-sm bouton_action"><span data-feather="power"></span></button>
                                
                            </form>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
        <div class="d-flex justify-content-center align-items-center">
            <?php paginate($pageCount, $page, '/admin/clients'); ?>
        </div>
    </div>
</div>