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

    // get session for jQuery
    public function getSession()
    {
        $session = session();

        return $this->response->setJSON([
            'user_id' => $session->get('user_id'),
            'username' => $session->get('username'),
            'role' => $session->get('role'),
            'is_login' => $session->get('is_login')
        ]);
    }

    // ambil data user berdasarkan user_id
    public function userById($user_id = 0)
    {
        $data = $this->userModel->where('user_id', $user_id)->findAll();

        return $this->response->setJSON([
            'status' => 'success',
            'message' => 'Fetch data success',
            'data' => $data
        ]);
    }

    // register user baru 
    public function register()
    {
        $data = $this->request->getPost();

        // validation rules
        $validationRules = [
            'name' => 'required|min_length[3]|max_length[150]',
            'username' => 'required|min_length[3]|max_length[150]|is_unique[users.username]',
            'password' => 'required|min_length[6]',
            'email'    => 'required|valid_email|is_unique[users.email]',
        ];

        if (!$this->validate($validationRules)) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => implode("\n", $this->validator->getErrors())
            ]);
        }

        // bersihkan data inputan yang diterima
        $data['username'] = htmlspecialchars(strip_tags($data['username']));
        $data['email'] = filter_var($data['email'], FILTER_SANITIZE_EMAIL);

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
    }
    
    // tangani login user
    public function login()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $this->userModel->where('username', $username)->first();

        if (!$user) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Incorrect username or password'
            ]);
        }

        if (!password_verify($password, $user['password'])) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Incorrect username or password'
            ]);
        }

        // tambahkan session ketika user berhasil login
        session()->set([
            'user_id' => $user['user_id'],
            'username' => $user['username'],
            'role' => $user['role'],
            'is_login' => true
            /* name username password email gender role*/

        ]);

        return $this->response->setJSON(['status' => 'success', 'message' => 'Login successfully']);
    }

    // tangani logout user
    public function logout()
    {
        session()->destroy();

        return redirect()->to('');
    }
}
