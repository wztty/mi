<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Addshop extends Model
{
   //关联数据表
    protected $table ='goods';
    //开启自动维护时间戳
    public $timestamps = true;

  
}
