<?php

namespace App\Controllers;

use App\Models\ResultModel;
use CodeIgniter\RESTful\ResourceController;

class ResultController extends ResourceController
{
    protected $resultModel;

    public function __construct()
    {
        $this->resultModel = new ResultModel();
    }

    public function saveResultTest()
    {
        $char_type = $this->request->getPost('char_type');
        $kana_type = $this->request->getPost('kana_type');
        $true_answer = $this->request->getPost('true_answer');
        $false_answer = $this->request->getPost('false_answer');

        

    }
}
