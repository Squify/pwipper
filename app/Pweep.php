<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pweep extends Model
{
    protected $table = "pweeps";
    protected $fillable = [
        'message', 'image_path_1', 'image_path_2', 'image_path_3', 'image_path_4', 'is_deleted', 'initial_pweep_id'
    ];

    /**
     * Get all replies of the pweep
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function replies()
    {
        return $this->hasMany('App\Pweep', 'id', 'initial_pweep_id');
    }

    /**
     * Get all replies of the pweep
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function initial_pweep()
    {
        return $this->hasOne('App\Pweep', 'initial_pweep_id', 'id');
    }

    public function hashtags()
    {
        return $this->belongsToMany('App\Hashtag');
    }
}
