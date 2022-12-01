<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdditOrganization extends Model
{
    use HasFactory;
    protected $table = 'additional_organization';

    protected $fillable=[
        'id',
        'additional_id',
        'organization_id',
    ];
    public $timestamps = false;
}
