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
        $sql = "SELECT c.nom, c.id FROM categories c";
        $stmt = db()->query($sql);

        return $stmt->fetchAll();
    }

    /**
     * Recupère une catégorie par id depuis la base de données
     * 
     * @param int $id l'id de la catégorie
     */
    public function findById($id)
    {
        $stmt = db()->prepare("SELECT nom FROM categories WHERE id = ?");
        $stmt->execute([$id]);

        return $stmt->fetch();
    }

    /**
     * Ajoute une catégories à la base de données
     * 
     *@param $nom le nom de la catégories
     */
    public function createCategorie($nom)
    {
        $sql = db()->prepare("INSERT into categories (nom) VALUES (:nom)");
        $sql->execute([
            'nom' => $nom,
        ]);
    }

    /**
     * Modifie une catégories
     * 
     * @param int $id l'id de la catégorie
     * @param string $nom le nom de la catégorie
     */
    public function updateCategory($id, $nom)
    {
        $sql = db()->prepare("UPDATE categories SET nom = :nom WHERE id = :id");
        
        $sql->execute([
            'id' => $id,
            'nom' => $nom
        ]);
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
}
