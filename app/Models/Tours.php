<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tours extends Model
{
    use HasFactory;

    protected $table = "tours";

    public $timestamps = false;

    protected $fillable = [
        'name',
        'description',
        'id_country',
        'id_city',
        'id_hotel',
        'count_persons',
        'transport',
        'price',
        'time_from',
        'time_to',
        'visa',
        'insurance',
        'transfer',
        'img'
    ];

    public function country()
    {
        return $this->belongsTo(Countries::class, 'id_country');
    }

    public function city()
    {
        return $this->belongsTo(Cities::class, 'id_city');
    }

    public function hotel()
    {
        return $this->belongsTo(Hotels::class, 'id_hotel');
    }

    public function images(){
        return $this->belongsToMany(Images::class, 'tour_images', 'tour_id', 'image_id');
    }
}
