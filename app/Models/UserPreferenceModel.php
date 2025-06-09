<?php

namespace App\Models;

use CodeIgniter\Model;

class UserPreferenceModel extends Model
{
    protected $table            = 'user_preferences';
    protected $primaryKey       = 'user_id'; // Porque la PK es user_id, no id

    protected $useAutoIncrement = false; // ¡Importante! Porque no usamos auto_increment
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;

    protected $allowedFields    = [
        'user_id',
        'theme',
        'language',
        'created_at',
        'updated_at',
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $validationRules = [
        'user_id'  => 'required|is_natural_no_zero',
        'theme'    => 'required|in_list[light,dark]',
        'language' => 'required|max_length[5]',
    ];

    protected $validationMessages = [
        'theme' => [
            'in_list' => 'El tema debe ser "light" o "dark".',
        ],
        'language' => [
            'max_length' => 'El código de idioma debe tener máximo 5 caracteres (ej: "es", "en").',
        ],
    ];

    protected $skipValidation = false;

    // 🧾 Obtener preferencias por ID de usuario
    public function getByUserId(int $userId)
    {
        return $this->where('user_id', $userId)->first();
    }

    // 🛠️ Método para actualizar o crear en un solo paso
    public function upsertByUserId(int $userId, array $data)
    {
        $data['user_id'] = $userId;
        return $this->save($data);
    }
}