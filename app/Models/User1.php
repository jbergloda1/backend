<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'user_oid';
    protected $guarded = ['created_at', 'updated_at', 'deleted_at'];

    public function role()
    {
        return $this->hasOne(role::class, 'role_oid', 'role_oid');
    }
}
