<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class design extends Model
{
    protected $fillable = [
        'name', 'img',
];
    public function sales_order(){

        return $this->belongsToMany('App\Sales_order')->withPivot('quantity','rate','type','lot_no','draft_qty','is_draft','id');
    }
}
