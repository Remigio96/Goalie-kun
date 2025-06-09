<?php

namespace App\Models;

use CodeIgniter\Model;

class MovementModel extends Model
{
    protected $table            = 'movements';
    protected $primaryKey       = 'id';

    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;

    protected $allowedFields    = [
        'goal_id',
        'amount',
        'type',
        'description',
        'date',
        'created_at',
        'updated_at',
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $validationRules = [
        'goal_id'    => 'required|is_natural_no_zero',
        'amount'     => 'required|decimal',
        'type'       => 'required|in_list[in,out]',
        'date'       => 'permit_empty|valid_date',
        'description'=> 'permit_empty|max_length[500]',
    ];

    protected $validationMessages = [
        'goal_id' => [
            'required' => 'Debe estar asociado a una meta.',
        ],
        'amount' => [
            'required' => 'Debes ingresar un monto.',
            'decimal'  => 'El monto debe ser un número válido.',
        ],
        'type' => [
            'required' => 'Debes indicar si es ingreso o retiro.',
            'in_list' => 'El tipo debe ser "in" o "out".',
        ],
    ];

    protected $skipValidation = false;

    // 📊 Obtener movimientos por meta
    public function getByGoal(int $goalId)
    {
        return $this->where('goal_id', $goalId)
                    ->orderBy('date', 'DESC')
                    ->findAll();
    }

    // 🔄 Obtener el balance acumulado (ingresos - egresos)
    public function getGoalBalance(int $goalId)
    {
        $movements = $this->select('amount, type')
                          ->where('goal_id', $goalId)
                          ->findAll();

        $balance = 0;

        foreach ($movements as $m) {
            $balance += ($m['type'] === 'in') ? floatval($m['amount']) : -floatval($m['amount']);
        }

        return $balance;
    }
}
