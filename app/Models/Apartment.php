<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'bathroom_no',
        'bed_no',
        'room_no',
        'square_meters',
        'address',
        'latitude',
        'longitude',
        // TODO: verificare che latitude e longitude funzionino
        'is_available',
    ];

    //

    public function user() {
        return $this->belongsTo("App\User");
    }

    public function messages(){
        return $this->hasMany('App\Models\Message');
    }

    public function photos(){
        return $this->hasMany('App\Models\Photo');
    }

    public function services() {
        return $this->belongsToMany('App\Models\Service')->withTimestamps();
    }

    public function sponsorships() {
        return $this->belongsToMany('App\Models\Sponsorship')->withPivot('expiration_date')->withTimestamps();
    }

    public function visuals(){
        return $this->hasMany('App\Models\Visual');
    }


}
