<?php
namespace App\Repositories;

use App\Mail\welcomemail;
use App\Models\Client_Detail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;

class ClientRepository extends BaseRepository
{
    public function __construct(Client_Detail $model)
    {
        parent::__construct($model);
    }
    
    public function getUser(){
        
        return  $this->newQuery()->with('user')->get();
    }
}


