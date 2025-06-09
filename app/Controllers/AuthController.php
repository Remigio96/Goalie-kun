<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class AuthController extends Controller
{
    protected $userModel;
    protected $session;
    protected $request;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->session   = session();
        $this->request   = service('request');
    }

    // 📝 Mostrar formulario de registro
    public function registerForm()
    {
        return view('auth/register');
    }

    // 📥 Procesar registro
    public function register()
    {
        $data = $this->request->getPost();

        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

        if ($this->userModel->insert($data)) {
            return redirect()->to('/login')->with('success', 'Cuenta creada correctamente');
        } else {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->userModel->errors());
        }
    }

    // 📝 Mostrar formulario de login
    public function loginForm()
    {
        return view('auth/login');
    }

    // 🔐 Procesar login
    public function login()
    {
        $email    = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $this->userModel->where('email', $email)->first();

        if ($user && password_verify($password, $user['password'])) {
            $this->session->set([
                'user_id' => $user['id'],
                'email'   => $user['email'],
                'name'    => $user['name'],
                'isLoggedIn' => true,
            ]);

            return redirect()->to('/dashboard');
        }

        return redirect()->back()
            ->withInput()
            ->with('error', 'Credenciales inválidas');
    }

    // 🔓 Cerrar sesión
    public function logout()
    {
        $this->session->destroy();
        return redirect()->to('/login');
    }
}