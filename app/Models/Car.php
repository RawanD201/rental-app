<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Car extends Model
{
    use HasFactory;

    protected $table = 'cars';
    protected $primaryKey = 'id';


    protected $fillable = [
        'user_id',
        'car',
        'model',
        'color',
        'america_price',
        'dubai_transfer',
        'repair_price',
        'gumrk_price',
        'total_price',
        'sell_price',
        'date',
        'deleted_by',
    ];


    public function getCreatedAtAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->diffForHumans();
    }
    public function getUpdatedAtAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->diffForHumans();
    }




    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
