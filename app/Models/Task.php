<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{   
    public $incrementing = false;
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = Str::uuid()->toString();
            }
        });
    }

}
