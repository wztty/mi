<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skus extends Model
{
    //关联数据表
    protected $table ='skus';
    //开启自动维护时间戳
    public $timestamps = true;

}
