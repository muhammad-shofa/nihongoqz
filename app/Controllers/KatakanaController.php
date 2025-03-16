<?php

namespace App\Controllers;

use App\Models\KatakanaModel;
use CodeIgniter\RESTful\ResourceController;

class KatakanaController extends ResourceController
{
    protected $katakanaModel;

    public function __construct()
    {
        $this->katakanaModel = new KatakanaModel();
    }

    // ambi semua data dari tabel hiragana
    public function index()
    {
        $dataKatakana = $this->katakanaModel->findAll();

        return $this->response->setJSON(['status' => 'success', 'dataKatakana' => $dataKatakana]);
    }
}
