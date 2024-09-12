<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    protected $table = 'orders';

    public $timestamps = false;

    protected $fillable = [
        'tour_id',
        'email',
        'status_id'
    ];

    public function tour()
    {
        return $this->belongsTo(Tours::class, 'tour_id', 'id');
    }

    public function status()
    {
        return $this->belongsTo(Statuses::class, 'status_id', 'id');
    }
}
