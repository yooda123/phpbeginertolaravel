<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    // 主 -> 従
    public function shops() {
        return $this->hasMany('App\Models\Shop');
    }

}
