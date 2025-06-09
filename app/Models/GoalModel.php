<?php

namespace App\Models;

use CodeIgniter\Model;

class GoalModel extends Model
{
    protected $table            = 'goals';
    protected $primaryKey       = 'id';

    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;

    protected $allowedFields    = [
        'user_id',
        'title',
        'target_amount',
        'current_amount',
        'cover_image',
        'deadline',
        'is_archived',
        'created_at',
        'updated_at',
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $validationRules    = [
        'user_id'        => 'required|is_natural_no_zero',
        'title'          => 'required|min_length[3]|max_length[100]',
        'target_amount'  => 'required|decimal',
        'current_amount' => 'permit_empty|decimal',
        'deadline'       => 'permit_empty|valid_date',
    ];

    protected $validationMessages = [
        'user_id' => [
            'required' => 'Debe estar asociado a un usuario.',
        ],
        'title' => [
            'required'    => 'El título es obligatorio.',
            'min_length'  => 'El título debe tener al menos 3 caracteres.',
        ],
        'target_amount' => [
            'required' => 'Debes definir un monto objetivo.',
            'decimal'  => 'El monto debe ser un número decimal válido.',
        ],
    ];

    protected $skipValidation     = false;

    // 🔍 Método personalizado opcional: metas activas
    public function getActiveGoalsByUser(int $userId)
    {
        return $this->where('user_id', $userId)
                    ->where('is_archived', false)
                    ->orderBy('created_at', 'DESC')
                    ->findAll();
    }
}