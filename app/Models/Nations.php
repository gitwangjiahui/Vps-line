<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nations extends Model
{
    use HasFactory;

    protected $connection = 'mysql';
    protected $table = 'nations';

    public function lines()
    {
        return $this->hasMany('App\Models\Lines', 'nation_id', 'id');
    }
}
