<?php

namespace App\Models;

use Illuminate\Support\Str;

/**
 * 产品，产品SKU处理公共代码
 */
trait ItemTrait
{
    /**
     * 访问器 获取image_url 图片完整路径
     * @return mixed
     */
    public function getImageUrlAttribute()
    {
        // 如果 image 字段本身就已经是完整的 url 就直接返回
        if (Str::startsWith($this->attributes['image'], ['http:', 'https://'])) {
            return $this->attributes['image'];
        }
        return \Storage::disk('public')->url($this->attributes['image']);
    }
}