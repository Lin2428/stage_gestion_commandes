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

    public function findById($id)
    {
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
