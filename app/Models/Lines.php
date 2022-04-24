<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lines extends Model
{
    use HasFactory;

    protected $connection = 'mysql';
    protected $table = 'lines';

    //是否会员
    const IS_FREE = 1; // 免费
    const IS_NOT_FREE = 2; // 收费

    // 用户状态
    const ON_LINE = 1; // 正常
    const NOT_ON_LINE = 2; // 离线

    public function nation()
    {
        return $this->belongsTo('App\Models\Nations', 'nation_id');
    }
}
