<?php

namespace App\Controllers;

use App\Models\UsersModel;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class AuthController extends BaseController
{
    public function index()
    {
        //
        return view('widgets/login');
    }
    /**
     * Function to authenticate user
     * @return mixed
     */
    public function login()
    {
        $session = session();
        $userModel = new UsersModel();

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $user = $userModel->where('email', $email)->first();

        if ($user) {
        $pass = $user['password'];
        $authenticatePassword = password_verify($password, $pass);
        if ($authenticatePassword) {
        $sessionData = [
        'id' => $user['id'],
        'name' => $user['fname'].' '.$user['lname'],
        'email' => $user['email'],
        'logged_in' => TRUE
        ];
       session()->set("loggedUser", $sessionData);
        return redirect()->to('/home');
        } else {
        $session->setFlashdata('msg', 'Wrong Credentials.');
        return redirect()->to('/login');
        }
        } else {
        $session->setFlashdata('msg', 'Email does not exist.');
        return redirect()->to('/');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }
}
