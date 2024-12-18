<?php
namespace App\Repositories;

use App\Mail\welcomemail;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;

class UserRepository extends BaseRepository
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }
    public function getUser(){
        return  $this->newQuery()->where('role','client')->get();
    }
}


