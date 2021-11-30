<?php

namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\JsonResource;

class Postagem extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'id' => $this->id,
            'titulo' => $this->titulo,
            'tema' => $this->tema,
            'conteudo' => $this->conteudo,
            'link' => $this->link,
            'criador' => $this->criador,
            'tags' => $this->tags
        ];
    }
}
