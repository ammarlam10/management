<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale_draft extends Model
{
    public function order(){
        return $this->belongsTo('App\Sales_order');
    }
}
