<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client_Detail extends Model
{
    public $incrementing = false;
    
    protected $guarded = [];
    protected $table = 'client_details';
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
