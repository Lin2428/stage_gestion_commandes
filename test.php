<?php

use Faker\Factory;

require 'bootstrap.php';
require 'vendor/autoload.php';

$faker = Faker\Factory::create('fr_FR');

/*
$nom =  $faker->name();
$prenom = $faker->lastName();
$email = $faker->email();
$tel = (string)$faker->ean8();;
$password = $faker->password();
$date = $faker->date("Y-m-d");
$sql = db()->prepare("INSERT into clients (nom, prenom, email, tel, password, updated_at) VALUES (:nom, :prenom, :email, :tel, :password, :updated_at)");
$sql->execute([
    'nom' => $nom,
    'prenom' => $prenom,
    'email' => $email,
    'tel' => $tel,
    'password' => $password,
    'updated_at' => $date
]);


echo "ok";
*/

/*$status = ['passer', 'traiter', 'livraison', 'livrer', 'annuler'];

$pdo = db();

for ($i = 1; $i <= 1000; $i++) {
    $livreurs = [2, 3, 4];
    $livreurId = $faker->randomElement($livreurs);

    $prouits = [3, 4, 12, 14];


    $clientId = $faker->numberBetween(7, 19);
    echo "ClientId : $clientId \n";

    $numero = date('my-') . str_pad((string)$i, 6, "0", STR_PAD_LEFT);
    $adresse = $faker->address;
    $st = $faker->randomElement($status);
    $createdAt = $faker->dateTimeBetween('-2 years');
    $updatedAt = $createdAt;

    $sql = "INSERT INTO commandes (numero, adresse, statut, created_at, updated_at, client_id, livreur_id) VALUE(:numero, :adresse, :statut, :created_at, :updated_at, :client_id, :livreur_id)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'numero' => $numero,
        'adresse' => $adresse,
        'statut' => $st,
        'created_at' => $createdAt->format('Y-m-d H:i:s'),
        'updated_at' => $createdAt->format('Y-m-d H:i:s'),
        'client_id' => $clientId,
        'livreur_id' => $livreurId,
    ]);

    $lastId = $pdo->lastInsertId();

    for($y = 0; $y < $faker->numberBetween(2, 6); $y++) {
        $productId = $faker->randomElement($prouits);
        $prix = $faker->numberBetween(2500, 10000);
        $qty = $faker->numberBetween(1, 8);

        $sql = "INSERT INTO produits_commandes(prix, quantite, produit_id, commande_id) VALUE (?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$prix, $qty, $productId, $lastId]);
    }

    echo "Insertion : $i \n";
}*/

// class A {
//     function __construct( protected $name = 'a'){}
// }

// class B extends A {
//     function __construct(A $a) {
//         die(var_dump($a->name));
//     }
// }

// new B(new A);

$options = [
    'cost' => 12
];
 echo password_hash("azertyuiop", PASSWORD_BCRYPT, $options);