<?php namespace App\Controllers;
use App\Models\UserModel;

class Auth extends BaseController {
    
    public function login() {
        return view('auth/login');
    }

    public function process() {
        $model = new UserModel();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        
        $user = $model->where('username', $username)->first();
        
        if ($user && password_verify($password, $user['password'])) {
            session()->set(['user_id' => $user['id'], 'is_logged_in' => true]);
            return redirect()->to('/admin');
        } else {
            return redirect()->back()->with('error', 'Invalid Username or Password');
        }
    }

    public function logout() {
        session()->destroy();
        return redirect()->to('/login');
    }
}