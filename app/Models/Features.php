<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Features extends Model
{
    use HasFactory;

    protected $table = 'features';
    
    protected $fillable = [
        'name'
      
    ];

    public function hotels()
    {
        return $this->belongsToMany(Hotel::class, 'hotel_features', 'feature_id', 'hotel_id');
    }
}
