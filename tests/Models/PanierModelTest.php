<?php

namespace App\Tests\Models;

use CodeIgniter\Test\CIUnitTestCase;
use App\Models\PanierModel;
use CodeIgniter\Test\DatabaseTestTrait;

class PanierModelTest extends CIUnitTestCase
{
    use DatabaseTestTrait;

    protected $refresh = true;

    public function testAjouterArticle()
    {
        $model = new PanierModel();

        // Ajouter un article au panier // Assurez-vous que la table est vide avant le test
        $client_id = 1;
        $article_id = 101;
        $quantite = 2;
        $prix = 99.99;

        $id = $model->ajouterArticle($client_id, $article_id, $quantite, $prix);
        $this->assertIsInt($id, 'L\'ID retourné doit être un entier.');
        
        // Vérifier que l'article a bien été ajouté
        $result = $model->where('client_id', $client_id)->find($id);
        $this->assertNotNull($result, 'L\'article doit être trouvé dans le panier.');
        $this->assertEquals($client_id, $result['client_id'], 'Le client_id ne correspond pas.');
        $this->assertEquals($article_id, $result['article_id'], 'L\'article_id ne correspond pas.');
        $this->assertEquals($quantite, $result['quantite'], 'La quantité ne correspond pas.');
        $this->assertEquals($prix, $result['prix'], 'Le prix ne correspond pas.');
    }

    public function testSupprimerArticle()
    {
        $model = new PanierModel();

        // Ajouter un article pour pouvoir le supprimer
        $client_id = 1;
        $article_id = 102;
        $quantite = 1;
        $prix = 49.99;
        $id = $model->ajouterArticle($client_id, $article_id, $quantite, $prix);

        // Supprimer l'article
        $deleteStatus = $model->supprimerArticle($id);
        $this->assertTrue($deleteStatus, 'La suppression de l\'article a échoué.');
        
        // Vérifier que l'article a bien été supprimé
        $result = $model->find($id);
        $this->assertNull($result, 'L\'article doit avoir été supprimé.');
    }

    public function testGetPanier()
    {
        $model = new PanierModel();

        // Ajouter des articles au panier
        $client_id = 2;
        $model->ajouterArticle($client_id, 103, 3, 29.99);
        $model->ajouterArticle($client_id, 104, 1, 19.99);

        // Récupérer les articles du panier
        $result = $model->getPanier($client_id);
        $this->assertCount(2, $result, 'Le panier doit contenir 2 articles.');
    }
}