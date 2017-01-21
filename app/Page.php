<?php

namespace App;

use App\User;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
        'name', 'url',
    ];


    public function users (){

        return $this->belongsTo('App\User');
    }

}
