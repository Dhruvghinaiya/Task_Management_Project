<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;
    protected $keyType = 'string'; 
    public $incrementing = false;
    // protected $keyType = 'string'; 
    // public $incrementing = false; 
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    // protected $guarded = [];
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'created_by',
        'updated_by',
    ];
    public function client()
    {
        return $this->hasMany(Client::class);
    }
        
    public function project()
    {
        return $this->belongsToMany(Project::class, 'project_employees', 'user_id', 'project_id');
    }


    public function projectsAsClient()
    {
        return $this->hasMany(Project::class, 'client_id');
    }

    // A user can have many projects as a creator
    public function projectsCreated()
    {
        return $this->hasMany(Project::class, 'created_by');
    }

    // A user can have many projects as an updater
    public function projectsUpdated()
    {
        return $this->hasMany(Project::class, 'updated_by');
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

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