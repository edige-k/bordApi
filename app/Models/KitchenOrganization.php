<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kitchen;
use App\Models\Organization;
class KitchenOrganization extends Model
{
    use HasFactory;
    protected $table = 'kitchen_organization';

    protected $fillable=[
        'id',
        'kitchen_id',
        'organization_id',
    ];
    public $timestamps = false;
}
