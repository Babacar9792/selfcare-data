<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return [
            "id"=>  $this->id,
            "prenom"=>  $this->prenom,
            "nom"=>  $this->nom,
            "email"=>  $this->email,
            "departement"=>  $this->departement,
            "login_windows"=>  $this->login_windows,
            "role" => $this->getRoleNames()
        ];
    }
}
