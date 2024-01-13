<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Statistic extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'tasks_count',
    ];
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('order', function (Builder $builder) {
            $builder->orderBy('tasks_count', 'desc');
        });
    }


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}