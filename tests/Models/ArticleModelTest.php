<?php
use PHPUnit\Framework\TestCase;
use App\Models\ArticleModel;

class ArticleModelTest extends TestCase
{
    private $articleModel;

    // Méthode de setup avant chaque test
    protected function setUp(): void
    {
        $this->articleModel = new ArticleModel();
    }

    // Vérifier que la référence de l'article n'est pas vide
    public function testRefIsNotEmpty()
    {
        // Créer un article pour tester
        $this->articleModel->save([
            'ref' => 'ART123', // Référence de l'article
            'name' => 'Sample Article', // Nom de l'article
            'qte_stocke' => 10, // Quantité en stock
            'prix' => 50.00, // Prix de l'article
        ]);
        
        $article = $this->articleModel->find(1); // Supposons que l'article a un id de 1 après insertion
        $this->assertNotEmpty($article['ref'], 'Reference should not be empty.');
    }

    // Vérifier que le nom de l'article n'est pas vide
    public function testNameIsNotEmpty()
    {
        $this->articleModel->save([
            'ref' => 'ART123',
            'name' => 'Sample Article',
            'qte_stocke' => 10,
            'prix' => 50.00,
        ]);

        $article = $this->articleModel->find(1);
        $this->assertNotEmpty($article['name'], 'Name should not be empty.');
    }

    // Vérifier que la quantité en stock est positive
    public function testQteStockeIsPositive()
    {
        $this->articleModel->save([
            'ref' => 'ART123',
            'name' => 'Sample Article',
            'qte_stocke' => 10,
            'prix' => 50.00,
        ]);

        $article = $this->articleModel->find(1);
        $this->assertGreaterThan(0, $article['qte_stocke'], 'qte_stocke should be greater than zero.');
    }

    // Vérifier que les champs autorisés correspondent aux attentes
    public function testAllowedFieldsContainExpectedFields()
    {
        $expectedFields = ['ref', 'name', 'qte_stocke', 'prix', 'description'];
        $this->assertEquals($expectedFields, $this->articleModel->allowedFields, 'Allowed fields do not match expected fields.');
    }
}
?>
