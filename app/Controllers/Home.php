<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Home extends Controller
{
    public function index()
    {
        // Si ya está logueado, redirige al dashboard
        if (session()->get('isLoggedIn')) {
            return redirect()->to('/dashboard');
        }

        // Si no, muestra la landing page
        return view('home/welcome', ['title' => 'Bienvenido']);
    }
}