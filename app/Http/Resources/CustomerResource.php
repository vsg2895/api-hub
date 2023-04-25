<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
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
            'display_name' => $this->displayName,
            'given_name' => $this->givenName,
            'job_title' => $this->jobTitle,
            'mail' => $this->mail,
            'mobile_phone' => $this->mobilePhone,
            'office_location' => $this->officeLocation,
            'preferred_language' => $this->preferredLanguage,
            'surname' => $this->surname,
            'user_principal_name' => $this->userPrincipalName,
            'business_phones' => $this->phones,
            'status' => $this->status,
            'created_at' => (string)$this->created_at,
            'updated_at' => (string)$this->updated_at,
        ];
    }
}
