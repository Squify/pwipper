<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hashtag extends Model
{
    protected $table = "hashtags";
    protected $fillable = [
        'message'
    ];

    public function pweeps()
    {
        return $this->belongsToMany('App\Pweep', 'pweeps_hashtags', 'pweep_id', 'hashtag_id');
    }
}
