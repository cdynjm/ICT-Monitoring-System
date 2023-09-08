<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    use HasFactory;

    protected $table = 'assets';

    public $timestamps;

    protected $fillable = [
        'name',
        'position',
        'contact_number',
        'address',
        'property_name',
        'quantity',
        'person_in_charge',
        'date_borrowed',
        'date_returned',
        'status'
    ];
}
