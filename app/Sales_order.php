<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sales_order extends Model
{
    protected $fillable = [
        'total', 'party_id','sdate',
    ];


    public function party(){

        return $this->belongsTo('App\Party');
    }

//    public function delivery(){
//
//        return $this->hasOne('App\Goods_delivered');
//    }

    public function design(){

        return $this->belongsToMany('App\Design')->withPivot('quantity','rate','type','lot_no','draft_qty','is_draft','id');
    }
    public function draft(){
    return $this->hasOne('App\Sale_draft');
    }





}
