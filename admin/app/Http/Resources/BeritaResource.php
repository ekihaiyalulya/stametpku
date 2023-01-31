<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BeritaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'foto' => $this->foto,
            'judul' => $this->judul,
            'isi' => $this->isi,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
