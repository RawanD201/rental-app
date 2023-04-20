<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarDealer extends Model
{
    use HasFactory;

    protected $table = 'car_dealers';
    protected $primaryKey = 'id';


    protected $fillable = [
        'name',
        'phone',
        'location',
    ];
    public function getCreatedAtAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->diffForHumans();
    }
    public function getUpdatedAtAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->diffForHumans();
    }


    public function privateCars()
    {
        return $this->hasMany(PrivateCar::class, 'dealer_id', 'id');
    }
}
