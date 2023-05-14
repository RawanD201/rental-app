<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Treat extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'treats';
    protected $primaryKey = 'id';

    protected $fillable = [
        'car_name',
        'car_number',
        'merchant_id',
        'shasi_number',
        'color',
        'model',
        'border',
        'transport_price',
        'coc_price',
        'custom_price',
        'balance_price',
        'total_price',
        'recive_price',
        'amount_price',
        'in_sh',
        'inv_agr',
    ];

    public function getCreatedAtAttribute($value)
    {
        return date('Y-m-d', strtotime($value));
    }

    public function getUpdatedAtAttribute($value)
    {
        return date('Y-m-d', strtotime($value));
    }

    public function merchant()
    {
        return $this->belongsTo(Merchant::class, 'merchant_id', 'id');
    }
}
