<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    
    protected $table = 'events';
    
    protected $fillable = ['name', 'title', 'venue','agenda','start_time','end_time'];
    
    public function users(){

        return $this->belongsTo('App\User');

    }
}
