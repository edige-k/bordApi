<?php


namespace App\Services\Admin\Contracts;

use App\Services\Admin\Dto\PartnerCreateDto;
interface  CreateOrganization
{

    public function execute(PartnerCreateDto $partnerCreateDto): void;

}