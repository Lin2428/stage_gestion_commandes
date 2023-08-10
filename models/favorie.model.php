<?php

class Favorie
{
   private $itemId;
   private $produitId;
   private $produitNom;
   private $produitPrix;
   private $produitImage;
   private $createdAt;
   private $statut;

   public function getItemId(): ?int
   {
    return $this->itemId;
   }

   public function getProduitId(): ?int
   {
    return $this->produitId;
   }

   public function getProduitNom(): ?string
   {
    return $this->produitNom;
   }

   public function getProduitPrix(): ?int
   {
    return $this->produitPrix;
   }

   public function getProduitImage(): ?string
   {
    return $this->produitImage;
   }

   public function getProduitStatut(): ?string
   {
    return $this->statut;
   }

   public function getcreatedAt()
   {
    return date_format(date_create($this->createdAt), "F d, Y",);
   }
}