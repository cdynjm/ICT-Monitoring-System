<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $table = 'schedule';

    public $timestamps;

    protected $fillable = [
        'userid',
        'roomid',
        'date_from',
        'date_to',
        'status'
    ];

    public function User() {
        return $this->hasOne(User::class, 'id', 'userid');
    }

    public function Room() {
        return $this->hasOne(Room::class, 'id', 'roomid');
    }
}
