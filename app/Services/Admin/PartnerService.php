<?php


namespace App\Services\Admin;


use App\Models\User;
use App\Repositories\PartnerRepositoryInterface;
use App\Services\Admin\Dto\PartnerCreateDto;
use http\Env\Response;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use App\Repositories\PartnerRepository;
use App\Services\Admin\Contracts\CreateOrganization;
use Illuminate\Support\Facades\DB;
class PartnerService implements CreateOrganization
{
    private PartnerRepositoryInterface $partnerRepositoryInterface;

    public function __construct(PartnerRepositoryInterface $partnerRepositoryInterface){
        $this->partnerRepositoryInterface=$partnerRepositoryInterface;
    }
public function execute(PartnerCreateDto $partnerCreateDto): void
{
    DB::transaction(function () use( $partnerCreateDto)
    {

         $user = $this->createPartner($partnerCreateDto);
        if ($user->role_id==3) {
            $user->assignRole('partner');
        }
        elseif ($user->role_id==2){
            $user->assignRole('manager');
        }
    });
}
    private function createPartner(PartnerCreateDto $partnerCreateDto):Model {

            return  $this->partnerRepositoryInterface->create($partnerCreateDto->toArray());


    }



    //    public function store( PartnerCreateDto $data){
//            $user = User::create([
//                'role_id'=>$data->role_id,
//                'name' => $data->name,
//                'email' =>$data->email,
//                'password' => Hash::make($data->password),
//            ]);
//            if($data->role_id==2){
//                $user->assignRole(['name' => 'manager']);
//            }
//            elseif ($data->role_id==3){
//                $user->assignRole(['name' => 'partner']);
//            }
////            $user->save();
//            return $user;
//        }
}
