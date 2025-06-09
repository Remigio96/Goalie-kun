<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'id';

    protected $useAutoIncrement = true;
    protected $returnType       = 'array'; // Puedes cambiar a 'object' si prefieres
    protected $useSoftDeletes   = false;

    protected $allowedFields    = [
        'name',
        'email',
        'password',
        'created_at',
        'updated_at',
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $validationRules    = [
        'email'    => 'required|valid_email|is_unique[users.email,id,{id}]',
        'password' => 'required|min_length[6]',
    ];
    protected $validationMessages = [
        'email' => [
            'required'    => 'El correo electrónico es obligatorio.',
            'valid_email' => 'Debes ingresar un correo válido.',
            'is_unique'   => 'Este correo ya está registrado.',
        ],
        'password' => [
            'required'    => 'La contraseña es obligatoria.',
            'min_length'  => 'La contraseña debe tener al menos 6 caracteres.',
        ],
    ];
    protected $skipValidation     = false;

    // Opcional: métodos personalizados
}