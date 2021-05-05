<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Document extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'document_oid';
    protected $guarded = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts = ['context' => 'object'];

    public function getProductNameAttribute()
    {
        return $this->context->name;
    }
}
