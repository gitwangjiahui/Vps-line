<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;

    protected $connection = 'mysql';
    protected $table = 'users';

    // 用户状态
    const IS_WHITELIST = 1; // 正常
    const IS_BACKLIST = 2; // 禁用(黑名单)
}
