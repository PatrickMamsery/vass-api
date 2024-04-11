<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VetResource extends JsonResource
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
            'fname' => $this->fname,
            'mname' => $this->mname,
            'sname' => $this->sname,
            'email' => $this->email,
            'phone' => $this->phone,
            'address' => $this->address,
            'role' => $this->role->name,
            'centre' => $this->vetCenter->center->name,
            'license_no' => $this->vetDetails->license_no,
            'license_expiry' => $this->vetDetails->license_expiry,
            'licence_copy' => $this->vetDetails->licence_copy,
        ];
    }
}
