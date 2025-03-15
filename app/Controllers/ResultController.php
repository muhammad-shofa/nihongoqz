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
        $session = session();
        $data_result = $this->request->getPost();
        $data_result['user_id'] = $session->get('user_id');

        $this->resultModel->save($data_result);

        return $this->response->setJSON(['status' => 'success', 'message' => 'Test result has been saved']);
    }
}
