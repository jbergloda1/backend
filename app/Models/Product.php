<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\ProductImage;
use App\Models\ProductSizeColor;
use App\Models\Supplier;

class Product extends Model
{
    use HasFactory;
    protected $table = 'product';
    protected $fillable = [
        'name',
        'amount',
        'img',
        'note',
        'import_price',
        'export_price',
        'sale',
        'status',
        'supplier_id',
        'category_id'
    ];
    protected $guarded = ['created_at', 'updated_at'];
    public $timestamps = true;

    public function supplier()
    {
        return $this->hasMany(Supplier::class, 'id', 'supplier_id');
    }

    // public function productImage()
    // {
    //     return $this->hasMany('App\Models\ProductImage');
    // }

    // public function productSize()
    // {
    //     return $this->hasManyThrough(ProductSize::class);
    // }

    // public function productColor()
    // {
    //     return $this->hasManyThrough('App\Models\ProductColor');
    // }

    public function productSizeColer()
    {
        
    }
}
