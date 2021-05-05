<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    public $timestamps = false;
    protected $table = 'permission';
    public function roles(){
        return $this->belongsToMany(Role::class,'role_permission','id_permission','id_role');
    }
}
