<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ExpensesType extends Model
{
    use HasFactory, SoftDeletes;


    protected $table = 'expenses_type';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name'
    ];


    public function getCreatedAtAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->diffForHumans();
    }
    public function getUpdatedAtAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->diffForHumans();
    }



    public function expenses()
    {
        return $this->hasMany(Expense::class, 'expense_id', 'id');
    }


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($model) {
            $model->save();
        });
    }
}
