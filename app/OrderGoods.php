<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderGoods extends Model
{
    //查看订单商品时返回订单
    public function order()
    {
        return $this->belongsTo('App\Order');
    }
    public function sku()
    {
        return $this->hasOne('App\Sku','id','sku_id');
    }
}
