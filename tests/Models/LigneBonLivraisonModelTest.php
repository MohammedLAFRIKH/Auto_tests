<?php
namespace App\Tests\Models;

use PHPUnit\Framework\TestCase;
use App\Models\LigneBonLivraisonModel;

class LigneBonLivraisonModelTest extends TestCase
{
    public function testInsertValidLigne()
    {
        $model = new LigneBonLivraisonModel();

        $data = [
            'idBonLivraison' => 1, // doit exister dans la BDD pour que le test passe
            'libelle'        => 'Clavier mécanique',
            'quantite'       => 5
        ];

        $this->assertTrue($model->insert($data) !== false, "Insertion valide acceptée");
    }

    public function testRejectInvalidQuantite()
    {
        $model = new LigneBonLivraisonModel();

        $data = [
            'idBonLivraison' => 1,
            'libelle'        => 'Souris',
            'quantite'       => 3
        ];

        $this->assertFalse($model->insert($data), "Insertion refusée si quantite <= 0");
        $this->assertArrayHasKey('quantite', $model->errors(), "Erreur détectée sur quantite");
    }
}