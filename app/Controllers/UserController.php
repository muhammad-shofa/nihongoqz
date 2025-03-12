<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\RESTful\ResourceController;

class UserController extends ResourceController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    // 
    // public function index() {

    // }

    // register user baru (kedepannya akan ditambahkan validasi)
    public function register()
    {
        $data = $this->request->getPost();
        
        // hash password
        $password_hashed = password_hash($data['password'], PASSWORD_DEFAULT);
        $data['password'] = $password_hashed;

        // dafault role
        $data['role'] = $data['role'] ?? 'user';

        if ($this->userModel->save($data)) {
            return $this->response->setJSON(['status' => 'success', 'message' => 'Register successfully']);
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Resgister failed']);
        }
        // $this->userModel->save($data);

    }
}
