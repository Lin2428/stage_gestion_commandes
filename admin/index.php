<?php
require '../bootstrap.php';

$repo = new AdminRepository();

$revenuCurrent = $repo->getCurrentRevenu();
$revenus = $repo->getRevenuTotal();

$commandesCurrent = $repo->getCurrentCommandes();
$commandes = count($commandesCurrent);


$revenu = 0;
for($i = 0; $i<count($revenuCurrent); $i++ ){
    $revenu += $revenuCurrent[$i]['prix'];
}

$revenuTotal = 0;
for($i = 0; $i<count($revenus); $i++ ){
    $revenuTotal += $revenus[$i]['prix'];
}
$livrer = 0;
for($i = 0; $i<count($commandesCurrent); $i++ ){
    if($commandesCurrent[$i]['statut'] === "livrer"){
        $livrer += 1;
    }
}

view(
    name: 'admin',
    pageTitle: 'Tableau de bord',
    params: [
        "revenuCurrent" => $revenu,
        "commandesCurrent" => $commandes,
        'livrer' => $livrer,
        'revenuTotal' => $revenuTotal,
    ]
);
