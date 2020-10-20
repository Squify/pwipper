<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $table = "notifications";
    protected $fillable = [
        'is_read'
    ];

    public function receiver()
    {
        return $this->hasOne('App\User', 'id', 'receiver_id');
    }

    public function initiator()
    {
        return $this->hasOne('App\User', 'id', 'initiator_id');
    }

    public function pweep()
    {
        return $this->hasOne('App\Pweep', 'id', 'pweep_id');
    }

    public function type()
    {
        return $this->hasOne('App\NotificationType', 'id', 'type_id');
    }
}
