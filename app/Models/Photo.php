<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = [
        'apartment_id',
        'file_name',
        'is_cover_photo',
    ];
    //
    public function apartment() {
        return $this->belongsTo('App\Models\Apartment');
    }
}
