<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Countries extends Model
{
    use HasFactory;

    protected $table = 'countries';

    public $timestamps = false;

    protected $fillable = [
        'name'
    ];
}
