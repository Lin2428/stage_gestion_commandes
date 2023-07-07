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
        $sql = "SELECT p.id, p.nom, p.prix, p.stock, p.description, p.image, p.statut, c.nom as category, c.id as categoryId FROM produits p INNER JOIN categories c ON c.id = p.categorie_id";
        $stmt = db()->query($sql);

        $stmt->setFetchMode(PDO::FETCH_CLASS, Produit::class);

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
        $stmt = db()->prepare("SELECT p.id, p.nom, p.prix, p.stock, p.categorie_id, p.description, p.image, c.id as categoryId, c.nom as category FROM produits p INNER JOIN categories c ON c.id = p.categorie_id WHERE p.id = ?");
        $stmt->execute([$id]);

        $stmt->setFetchMode(PDO::FETCH_CLASS, Produit::class);

        $produit = $stmt->fetchAll();
        return $produit;
    }

    /**
     * Ajoute un nouveau produit à la base de données 
     * 
     * @param array $postData le post du produit
     */
    public function createProduct($postData)
    {
        $sql = db()->prepare("INSERT into produits (nom, prix, stock, description, categorie_id, image) VALUES (:nom, :prix, :stock, :description, :category_id, :image)");
        $sql->execute($postData);
    }

    /**
     * Modifie un produit
     * 
     * @param array $postData le post du produit
     */
    public function updateProduit($postData)
    {
        $sql = db()->prepare("UPDATE produits SET nom = :nom, prix = :prix, stock = :stock, description = :description, categorie_id = :category_id, image = :image WHERE id = :id");
        
        $sql->execute($postData);
    }

    /**
     * Supprime un produit
     * 
     * @param int $id l'id du produit
     */
    public function deleteProduit($id)
    {
        $sql = db()->prepare("DELETE FROM produits WHERE id = ?");
        $sql->execute([$id]);
    }

    public function getCategories()
    {
        $sql = "SELECT * FROM categories";
        $stmt = db()->query($sql);

        $stmt->setFetchMode(PDO::FETCH_CLASS, Category::class);

        $categories = $stmt->fetchAll();

        return $categories;
    }

    public function getCategoriesLookup()
    {
        $categories = $this->getCategories();
        $options = [];

        foreach ($categories as $category) {
            $options[$category->getId()] = $category->getNom();
        }

        return $options;
    }
}


