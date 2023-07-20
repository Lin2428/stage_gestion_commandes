<?php

class CategoryRepository
{

    /**
     * Récupère tout les catégories depuis la base de données
     * 
     * @return array
     */

    public function getAll()
    {
        $sql = "SELECT * FROM categories ";
        $stmt = db()->query($sql);

        $stmt->setFetchMode(PDO::FETCH_CLASS, Category::class);

        $categories = $stmt->fetchAll();

        return $categories;
    }

    /**
     * Recupère une catégorie par id depuis la base de données
     * 
     * @param int $id l'id de la catégorie
     */

    public function findById($id)
    {
        $stmt = db()->prepare("SELECT * FROM categories WHERE id = ?");
        $stmt->execute([$id]);

        $stmt->setFetchMode(PDO::FETCH_CLASS, Category::class);

        return $stmt->fetchAll();
    }

    /**
     * Ajoute une catégories à la base de données
     * 
     *@param array $data les données a inserer
     */

    public function createCategorie($data)
    {
        $sql = db()->prepare("INSERT into categories (nom, statut, image) VALUES (:nom, :statut, :image)");
        $sql->execute($data);
    }

    /**
     * Modifie une catégories
     * 
     *@param array $data les données a inserer
     */

    public function updateCategory($data)
    {
        $sql = db()->prepare("UPDATE categories SET nom = :nom, image = :image WHERE id = :id");

        $sql->execute($data);
    }

    /**
     * Supprime une catégorie
     * 
     * @param int $id l'id de la catégorie
     */
    
    public function deleteCategory($id)
    {
        $sql = db()->prepare("DELETE FROM categories WHERE id = ?");
        $sql->execute([$id]);
    }

     /**
     * Met ajour le status d'une catégorie
     * 
     * @param int $id l'id de la categoriee la categorie produit
     */

     public function updateStatut($id, $statut)
     {
         $sql = db()->prepare("UPDATE categories SET statut = :statut WHERE id = :id");
 
         $sql->execute([
             'id' => $id,
             'statut' => $statut,
         ]);
     }
}
