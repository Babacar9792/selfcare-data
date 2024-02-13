<?php

namespace App\Http\Resources;

use App\Traits\SlugTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DepartementResource extends JsonResource
{
    use SlugTrait;
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return [
             "id" =>  $this->encodeSlug($this->id, $this->slug),
            "libelle" => $this->libelle,
        ];
    }
}
