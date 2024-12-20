<?php
namespace App\Repositories;

use App\Mail\welcomemail;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;

class ProjectRepository extends BaseRepository
{
    public function __construct(Project $model)
    {
        parent::__construct($model);
    }
  
    function getProjectsByEmployee($id)
    {
        return $this->newQuery()
            ->where('assigned_to', $id)
            ->get();
    }
}


