<?php


namespace App\Services\Admin\Dto;
use Spatie\DataTransferObject\DataTransferObject;

class PartnerCreateDto extends DataTransferObject
{

    public int $role_id;
    public string $name;
    public string $email;
    public string $password;
}
