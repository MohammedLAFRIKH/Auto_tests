<?php
namespace App\Controllers;
use App\Models\FactureModel;

class factureController extends BaseController {
    public function index() {
        $model = new factureModel();
        $data['facture'] = $model->findAll();
        return view('facture_list', $data);
    }

    public function create() {
        return view('create_facture');}
}
?>