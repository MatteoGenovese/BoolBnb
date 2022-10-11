<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visual extends Model
{
    protected $fillable = [
        'apartment_id',
        'user_ip',
    ];
    //
    public function apartment() {
        return $this->belongsTo('App\Models\Apartment');
    }
}
