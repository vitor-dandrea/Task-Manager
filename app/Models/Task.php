<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'status',
        'due_date'
    ];

    protected $casts = [
        'due_date' => 'date',
        'created_at' => 'datetime', 
        'updated_at' => 'datetime', 
    ];

    public function estaPendente()
    {
        return $this->status === 'pendente';
    }

    public function permiteEdicao()
    {
        return $this->estaPendente();
    }

    public function permiteExclusao()
    {
        return $this->estaPendente();
    }
}