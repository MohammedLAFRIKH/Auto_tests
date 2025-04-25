<?php

namespace App\Controllers;

use App\Models\LigneFactureModel;

class LigneFactureController extends BaseController
{
    public function index()
    {
        // Initialisation du modèle
        $model = new LigneFactureModel();
        
        // Récupération de toutes les lignes de facture
        $data['lignes'] = $model->findAll();

        // Retour de la vue avec les données
        return view('ligne_facture_list', $data);
    }

    public function create()
    {
       
        return view('create_ligne_facture');
    }

    public function store()
    {
      
        $data = $this->request->getPost();
        
       
        $model = new LigneFactureModel();
        
        if ($model->insert($data)) {
            return redirect()->to('/LigneFacture')->with('success', 'Ligne de facture ajoutée avec succès');
        } else {
            return redirect()->back()->with('error', 'Erreur lors de l\'ajout de la ligne de facture');
        }
    }
}
