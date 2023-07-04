<?php

class ProductRepository
{

    /**
     * Recupère tout les produits depuis la base de données
     * 
     * @return array
     */
    public function getAll()
    {
        $sql = "SELECT p.id, p.nom, p.prix, p.stock, p.description, c.nom as category FROM produits p INNER JOIN categories c ON c.id = p.categorie_id";
        $stmt = db()->query($sql);

        $products = $stmt->fetchAll();

        return $products;
    }

    /**
     * Recupère un produit par id depuis la base de données
     * 
     * @param int $id l'id du produit
     */
    public function findById($id)
    {
        $sql = db()->prepare("SELECT * FROM produits WHERE id = ?");
        $sql->execute([$id]);

        $product = $sql->fetch();
        return $product;
    }

    /**
     * Ajoute un nouveau produit à la base de données 
     * 
     * @param string $nom le nom du produit
     * @param string $prix le prix du produit
     * @param string $stock le stock du produit
     * @param string $category la catégorie du produit
     * @param string $description la description du produit
     */
    public function CreateProduct($nom, $prix, $stock, $category, $description)
    {
        $sql = db()->prepare("INSERT into produits (nom, prix, stock, description, categorie_id) VALUES (:nom, :prix, :stock, :description, :categorie_id)");
        $sql->execute([
            'nom' => $nom,
            'prix' => $prix,
            'stock' => $stock,
            'description' => $description,
            'categorie_id' => $category
        ]);
    }

    /**
     * Modifie un produit
     * 
     * @param int $id l'id du produit
     * @param string $nom le nom du produit
     * @param string $prix le prix du produit
     * @param string $stock le stock du produit
     * @param string $category la catégorie du produit
     * @param string $description la description du produit
     */
    public function UpdateProduit($id, $nom, $prix, $stock, $category, $description)
    {
        $sql = db()->prepare("UPDATE produits SET nom = :nom, prix = :prix, stock = :stock, description = :description, categorie_id = :categorie_id WHERE id = :id");
        $sql->execute([
            'id' => $id,
            'nom' => $nom,
            'prix' => $prix,
            'stock' => $stock,
            'description' => $description,
            'categorie_id' => $category
        ]);
    }

    /**
     * Supprime un produit
     * 
     * @param int $id l'id du produit
     */
    public function DeleteProduit($id)
    {
        $sql = db()->prepare("DELETE FROM produits WHERE id = ?");
        $sql->execute([$id]);
    }
}

class CategoryRepository
{

    /**
     * Récupère tout les catégories depuis la base de données
     * 
     * @return array
     */
    public function getAll()
    {
        $sql = "SELECT *FROM categories";
        $stmt = db()->query($sql);

        $category = $stmt->fetchAll();

        return $category;
    }
}
