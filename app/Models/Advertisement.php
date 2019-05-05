<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    //关联数据表
    protected $table ='advertisement';
    //开启自动维护时间戳
    public $timestamps = true;
    //状态设置
    public function getStatusAttribute($value){
	$status=[1=>"禁用",2=>"开启"];
	return $status[$value];
 }
}
