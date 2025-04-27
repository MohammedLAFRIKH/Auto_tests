<?php

namespace App\Models;

use CodeIgniter\Model;

class PanierModel extends Model
{
    protected $table = 'panier';
    protected $primaryKey = 'id';
    protected $allowedFields = ['client_id', 'article_id', 'quantite', 'prix'];

    public function ajouterArticle($client_id, $article_id, $quantite, $prix)
    {
        $data = [
            'client_id' => $client_id,
            'article_id' => $article_id,
            'quantite' => $quantite,
            'prix' => $prix,
        ];
        return $this->insert($data);
    }

    public function getPanier($client_id)
    {
        return $this->where('client_id', $client_id)->findAll();
    }

    public function supprimerArticle($id)
    {
        return $this->delete($id);
    }
}
