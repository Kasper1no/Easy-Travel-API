<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotels extends Model
{
    use HasFactory;

    protected $table = 'hotels';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'id_city',	
        'id_country',	
        'description',	
        'room_desc',
        'meal_desc',	
        'location_desc',	
        'beach_desc',	
        'address',
        'phone',
        'email',
        'rooms_desc',
        'free_count'	
    ];

    public function country(){
        return $this->belongsTo(Countries::class, 'id_country');
    }

    public function city(){
        return $this->belongsTo(Cities::class, 'id_city');
    }

    public function features()
    {
        // dd($this->belongsToMany(Features::class, 'hotels_features', 'hotel_id', 'feature_id'));
        return $this->belongsToMany(Features::class, 'hotels_features', 'hotel_id', 'feature_id');
    }
}
