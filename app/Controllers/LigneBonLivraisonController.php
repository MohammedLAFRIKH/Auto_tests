<?php
namespace App\Controllers;

use App\Models\LigneBonLivraisonModel;

class LigneBonLivraisonController extends BaseController
{
    public function index()
    {
        $model = new LigneBonLivraisonModel();
        $data['lignes'] = $model->findAll();
        return view('ligne_livraison_list', $data);
    }

    public function create()
    {
        return view('create_ligne_livraison');
    }

    public function store()
    {
        $model = new LigneBonLivraisonModel();
        $data = [
            'idBonLivraison' => $this->request->getPost('idBonLivraison'),
            'libelle'         => $this->request->getPost('libelle'),
            'quantite'        => $this->request->getPost('quantite')
        ];

        $model->insert($data);
        return redirect()->to('/lignes');
    }
}
