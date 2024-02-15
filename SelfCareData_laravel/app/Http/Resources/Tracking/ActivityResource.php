<?php

namespace App\Http\Resources\Tracking;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ActivityResource extends JsonResource
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
            'description' =>$this->description,
            'causer_person' => $this->causer,
            'subject_person' => $this->subject_id!=null?$this->subject:'null',
            'action_date' => $this->created_at,
            'propeties' => $this->propeties
        ];
    }
}
