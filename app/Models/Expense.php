<?php

namespace App\Models;

use App\Models\ItemsType;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Factories\HasFactory;


class Expense extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'expenses';
    protected $primaryKey = 'id';


    protected $fillable = [
        'name',
        'user_id',
        'expense_id',
        'expense_price',
        'verify',
        'note',
        'expense_date',
        'deleted_by'
    ];
    public function getCreatedAtAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->diffForHumans();
    }
    public function getUpdatedAtAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->diffForHumans();
    }

    public function expenseType()
    {
        return $this->belongsTo(ExpensesType::class, 'expense_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($model) {
            $model->deleted_by = Auth::user()->name;
            $model->save();
        });
    }
}
