<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

use App\Models\User;

use Illuminate\Http\Request;
class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request $request
     * @return array
     */
    public function toArray($request):array
    {
        /** @var User $this */
        return [
            'role_id'=>$this->resource->role_id,
            'name' => $this->resource->name,
            'email' => $this->resource->email,


        ];

    }
}
