<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Merchant extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'merchants';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'phone',
        'location',
    ];

    public function getCreatedAtAttribute($value)
    {
        return date('Y-m-d', strtotime($value));
    }

    public function getUpdatedAtAttribute($value)
    {
        return date('Y-m-d', strtotime($value));
    }


    public function getPhoneNumberAttribute($value)
    {
        return preg_replace('/^(\d{3})(\d{3})(\d{4})$/', '($1) $2-$3', $value);
    }

    public function setPhoneNumberAttribute($value)
    {
        $this->attributes['phone'] = preg_replace('/[^0-9]/', '', $value);
    }

    public function treat()
    {
        return $this->hasMany(Treat::class, 'id', 'id');
    }
}
