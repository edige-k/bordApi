<?php


namespace App\Repositories;
use App\Repositories\PartnerRepositoryInterface;
use App\Services\Admin\Dto\PartnerCreateDto;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class PartnerRepository extends BaseRepository implements PartnerRepositoryInterface
{
    public function __construct(User $user)
    {
        $this->model = $user;
    }
    /**
     * @param $data
     * @return mixed
     */
//    public function storePartner(array $data)
//    {
//        return $this->model->create($data);
//    }


//    public function storePartner(array $data)
//    {


//        $user = User::create([
//            'role_id' => $data->role_id,
//            'name' => $data->name,
//            'email' => $data->email,
//            'password' => Hash::make($data->password),
//        ]);
//        if ($data->role_id == 2) {
//            $user->assignRole(['name' => 'manager']);
//        } elseif ($data->role_id == 3) {
//            $user->assignRole(['name' => 'partner']);
//        }
//        $user->save();
//    }


}