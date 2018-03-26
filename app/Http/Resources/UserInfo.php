<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;
use App\Http\Resources\Address as AddressResource;
use App\Http\Resources\AddressCollection;
use App\Http\Resources\AddressUser as AddressUserResource;
use App\Address;

class UserInfo extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $roles = array();
        foreach($this->roles as $role) {
            array_push($roles,$role->name);
        };
        return [
            'id' => $this->id,
            'name' => $this->name,
            'phone' => $this->phone,
            'roles' => $roles,
            // 'addresses' => AddressUserResource::collection($this->addresses),
        ];
    }

    public function with($request)
    {
        return [
            'success' => true,
        ];
    }
}
