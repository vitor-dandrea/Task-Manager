<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'titulo' => $this->title,
            'descricao' => $this->description,
            'status' => $this->status,
            'data_vencimento' => $this->due_date?->format('d/m/Y'),
            'criado_em' => $this->created_at->format('d/m/Y H:i'),
        ];
    }
}