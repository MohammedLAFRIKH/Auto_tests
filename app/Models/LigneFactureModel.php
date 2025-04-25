<?php

namespace App\Models;

use CodeIgniter\Model;

class LigneFactureModel extends Model
{
  
    protected $table = 'LigneFacture';
    

    protected $primaryKey = 'id';
    
    protected $allowedFields = ['article_id', 'Qte', 'PRIXUnitaire'];
    protected $returnType = 'array';
    protected $useTimestamps = false;
    public function getTotal(array $ligne)
    {
        return $ligne['Qte'] * $ligne['PRIXUnitaire'];
    }
}
