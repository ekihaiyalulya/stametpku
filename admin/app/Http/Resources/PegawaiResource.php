<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PegawaiResource extends JsonResource
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
            // 'id' => $this->id,
            'nama' => $this->nama,
            'ttl' => $this->ttl,
            'foto' => $this->foto,
            'jabatan' => $this->jabatan,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
