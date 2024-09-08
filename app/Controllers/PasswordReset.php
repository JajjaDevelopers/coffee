<?php

namespace App\Controllers;

use Config\Services;
use App\Models\UserModel;
use App\Models\UsersModel;
use CodeIgniter\I18n\Time;
use CodeIgniter\Controller;

class PasswordReset extends Controller
{
    public function request()
    {
        return view('password_reset/request');
    }

    public function sendResetLink()
    {
        $email = $this->request->getPost('email');
        $userModel = new UsersModel();

        if (!$userModel->where('email', $email)->first()) {
            return redirect()->back()->with('error', 'Email not found.');
        }

        $token = bin2hex(random_bytes(50));
        $passwordResetModel = new \App\Models\PasswordResetModel();
        $passwordResetModel->save([
            'email' => $email,
            'token' => $token,
            'created_at' => Time::now(),
        ]);

        $emailService = Services::email();
        $emailService->setTo($email);
        $emailService->setSubject('Password Reset Request');
        $emailService->setMessage('Click on this link to reset your password: ' . site_url('password-reset/reset/' . $token));
        $emailService->send();

        return redirect()->back()->with('message', 'Reset link sent.');
    }

    public function reset($token = null)
    {
        $passwordResetModel = new \App\Models\PasswordResetModel();
        $reset = $passwordResetModel->where('token', $token)->first();

        if (!$reset) {
            return redirect()->to('/')->with('error', 'Invalid token.');
        }

        return view('password_reset/reset', ['token' => $token]);
    }

    public function updatePassword()
    {
        $token = $this->request->getPost('token');
        $password = $this->request->getPost('password');
        $passwordResetModel = new \App\Models\PasswordResetModel();
        $reset = $passwordResetModel->where('token', $token)->first();

        if (!$reset) {
            return redirect()->to('/')->with('error', 'Invalid token.');
        }

        $userModel = new UsersModel();
        $user = $userModel->where('email', $reset['email'])->first();
        $userModel->update($user['id'], ['password' => password_hash($password, PASSWORD_DEFAULT)]);

        $passwordResetModel->where('token', $token)->delete();

        return redirect()->to('/')->with('message', 'Password updated.');
    }
}
