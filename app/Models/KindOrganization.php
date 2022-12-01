<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KindOrganization extends Model
{
    use HasFactory;
    protected $table = 'kind_organization';

    protected $fillable=[
        'id',
        'kind_id',
        'organization_id',
    ];
    public $timestamps = false;
}
