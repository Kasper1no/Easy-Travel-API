<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cities extends Model
{
    use HasFactory;

    protected $table = 'cities';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'id_country	'
    ];

    public function country()
    {
        return $this->belongsTo(Countries::class, 'id_country');
    }
}
