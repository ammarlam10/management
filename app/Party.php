<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Party extends Model
{
    protected $fillable = [
        'name', 'contact_person', 'address','cell_1', 'cell_2'
    ];

    public function sales_order(){

        return $this->hasMany('App\Sales_order');
    }
}


