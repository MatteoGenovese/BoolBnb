<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'name',
    ];
    //
    public function apartments() {
        return $this->belongsToMany('App\Models\Apartment')->withTimestamps();
    }
}
