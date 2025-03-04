<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class SessionController extends BaseController
{
    public function index($check_this_session)
    {
        $session = session();
        $is_login = $session->get($check_this_session);
        if ($is_login) {
            return $this->response->setJSON(['status' => "active"]);
        } else {
            return $this->response->setJSON(['status' => "inactive"]);
        }
    }
}
