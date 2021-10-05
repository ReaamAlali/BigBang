<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    
    protected $fillable = ['num_of_room', 'count_of_beds'];


    public function users(){

        return $this->belongsToMany('App\Models\User');
    }
}
