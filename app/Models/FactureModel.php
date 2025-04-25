<?php
namespace App\Models;
use CodeIgniter\Model;

class factureModel extends Model {
    protected $table = 'facture';
    protected $primaryKey = 'id';
    protected $allowedFields = ['datefact', 'client','total'];
}
?>