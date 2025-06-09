<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class DashboardController extends Controller
{
    protected $session;

    public function __construct()
    {
        $this->session = session();
    }

    public function index()
    {
        // Verificar si el usuario ha iniciado sesión
        if (! $this->session->get('isLoggedIn')) {
            return redirect()->to('/login')->with('error', 'Debes iniciar sesión para acceder al panel');
        }

        $data = [
            'title' => 'Dashboard'
        ];

        return view('dashboard/index', $data);
    }
}