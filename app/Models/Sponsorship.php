<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sponsorship extends Model
{
    protected $fillable = [
        'name',
        'duration',
    ];
    //

    public function apartments() {
        return $this->belongsToMany('App\Models\Apartment')->withPivot('expiration_date')->withTimestamps();
    }
}
