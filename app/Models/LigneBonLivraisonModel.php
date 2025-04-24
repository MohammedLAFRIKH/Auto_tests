<?php
namespace App\Models;

use CodeIgniter\Model;

class LigneBonLivraisonModel extends Model
{
    protected $table = 'Lignebonlivraison';
    protected $primaryKey = 'idLigneBonLivraison';
    protected $allowedFields = ['idBonLivraison', 'libelle', 'quantite'];
}
