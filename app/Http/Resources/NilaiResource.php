<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NilaiResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'rank' => $this->rank,
            'nama' => $this->nama,
            'class' => $this->class,
            'modul' => $this->modul,
            'point' => $this->point,
            'created_at' => $this->created_at
        ];
    }
}
