<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\API\ResponseTrait;

class User extends BaseController
{

    use ResponseTrait;

    public function index()
    {
        echo "email: {$this->request->header("email")->getValue()}";
        $users = new UserModel();
        return $this->respond(['user' => $users->findAll()], 200);
    }
}
