<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\City;
use App\Models\Kitchen;
class Organization extends Model
{
    use HasFactory;


    protected $fillable = [
        'partner_id',
        'city_id',
        'name',
        'description',
        'image',
        'average_check',
        'menu',
        'link',
        'instagram',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }



    public function city()
    {
        return $this->belongsTo(City::class);
    }


    public function kitchens()
    {
        return $this->belongsToMany(Kitchen::class);
    }
}
