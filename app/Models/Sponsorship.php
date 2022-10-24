<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sponsorship extends Model
{
    protected $fillable = [
        'name',
        'duration',
        "price"
    ];
    //

    public function apartments() {
        return $this->belongsToMany('App\Models\Apartment', "apartment_sponsorship", "sponsorship_id", "apartment_id")->withPivot('expiration_date')->withTimestamps();
    }
}
