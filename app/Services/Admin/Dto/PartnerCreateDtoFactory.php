<?php


namespace App\Services\Admin\Dto;
use App\Http\Requests\Admin\Partner\StoreRequest;
class PartnerCreateDtoFactory
{
    public static function fromRequest(StoreRequest $request): PartnerCreateDto
    {
        return self::fromArray($request->validated());
    }
    public static function fromArray(array $data): PartnerCreateDto
    {
        return new PartnerCreateDto([
            'role_id' => $data['role_id'],
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],

        ]);
    }
}
