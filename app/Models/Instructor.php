<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    use HasFactory;

    protected $table = 'instructors';

    public $timestamps;

    protected $fillable = [
        'name',
        'position',
        'contact_number',
        'address',
    ];

    public function User() {
        return $this->hasOne(User::class, 'userid', 'id');
    }
}
