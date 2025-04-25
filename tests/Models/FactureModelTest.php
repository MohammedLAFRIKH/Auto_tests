<?php
namespace App\Tests\Models;

use PHPUnit\Framework\TestCase;
use App\Models\FactureModel;
use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\DatabaseTestTrait;
    
class FactureModelTest extends TestCase {


    
        public function testInsertFacture()
        {
            $model = new FactureModel();
    
            $data = [
                'datefact' => '2025-04-23',
                'client'   => 'Client Test',
                'total'    => 150.00,
            ];
    
            $id = $model->insert($data);
            $this->assertIsNumeric($id);
    
            $facture = $model->find($id);
            $this->assertEquals('Client Test', $facture['client']);
            $this->assertEquals(150.00, $facture['total']);
        }
    
        public function testUpdateFacture()
        {
            $model = new FactureModel();
    
            $id = $model->insert([
                'datefact' => '2025-04-23',
                'client'   => 'Client Original',
                'total'    => 100.00,
            ]);
    
            $model->update($id, ['client' => 'Client Modifié']);
            $updated = $model->find($id);
    
            $this->assertEquals('Client Modifié', $updated['client']);
        }
    
        public function testDeleteFacture()
        {
            $model = new FactureModel();
    
            $id = $model->insert([
                'datefact' => '2025-04-23',
                'client'   => 'Client à supprimer',
                'total'    => 200.00,
            ]);
    
            $model->delete($id);
            $this->assertNull($model->find($id));
        }
    }
    
 
?>