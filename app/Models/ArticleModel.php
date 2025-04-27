<?php

namespace App\Models;

use CodeIgniter\Model;

class ArticleModel extends Model
{
    protected $table = 'Article';
    protected $primaryKey = 'id';
    protected $allowedFields = ['ref', 'name', 'qte_stocke', 'prix', 'description'];
    protected $useTimestamps = true;

    // Fonction pour obtenir les articles disponibles
    public function getArticles()
    {
        return $this->findAll();
    }

    // Fonction pour insérer un article
    public function insertArticle($data)
    {
        return $this->save($data);
    }

    // Fonction pour récupérer un article par sa référence
    public function getArticleByRef($ref)
    {
        return $this->where('ref', $ref)->first();
    }
}
?>
