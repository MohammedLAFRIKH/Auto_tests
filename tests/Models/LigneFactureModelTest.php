<?php

namespace App\Tests\Models;

use PHPUnit\Framework\TestCase;
use App\Models\LigneFactureModel;

class LigneFactureModelTest extends TestCase
{
    public function testInsertValidLigne()
    {
        $model = new LigneFactureModel();
        
        $data = [
            'article_id' => 1,
            'Qte' => 10,
            'PRIXUnitaire' => 15.99
        ];

  
        $this->assertTrue($model->insert($data) !== false, "Insertion valide acceptée");
    }

    public function testRejectInvalidQuantite()
    {
        $model = new LigneFactureModel();
        
        // Exemple de données invalides (quantité non valide)
        $data = [
            'article_id' => 1,
            'Qte' => -5, // Quantité invalide
            'PRIXUnitaire' => 15.99
        ];

        // On vérifie si l'insertion est refusée et si une erreur est présente
        $this->assertFalse($model->insert($data), "Insertion refusée pour quantité invalide");
        $this->assertArrayHasKey('Qte', $model->errors(), "Erreur détectée sur la quantité");
    }

    public function testCalculTotal()
    {
        $model = new LigneFactureModel();

        // Exemple de données pour calculer le total
        $data = [
            'Qte' => 5,
            'PRIXUnitaire' => 20.50
        ];

        // Calcul du total
        $result = $model->getTotal($data);

        // Vérification du total attendu
        $this->assertEquals(102.5, $result, "Le total calculé est correct");
    }
}
