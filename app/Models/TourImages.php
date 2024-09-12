<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourImages extends Model
{
    use HasFactory;

    protected $table = 'tour_images';

    public $timestamps = false;

    protected $fillable = [
        'tour_id',
        'image_id'
    ];
}
