<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductSku extends Model
{
    //@fixme 为什么product_id不需要放进来
    protected $fillable = ['title', 'description', 'price', 'stock'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
