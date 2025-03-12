<?php

namespace App\Controllers;

use App\Models\HiraganaModel;
use CodeIgniter\RESTful\ResourceController;

class HiraganaController extends ResourceController
{
    protected $hiraganaModel;

    public function __construct()
    {
        $this->hiraganaModel = new HiraganaModel();
    }

    // ambi semua data dari tabel hiragana
    public function index()
    {
        $dataHiragana = $this->hiraganaModel->findAll();

        return $this->response->setJSON(['status' => 'success', 'dataHiragana' => $dataHiragana]);
    }
}
