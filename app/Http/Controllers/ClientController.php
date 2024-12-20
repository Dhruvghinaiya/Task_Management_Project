<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\Client_Detail;
use App\Models\User;
use App\Repositories\ClientRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ClientController extends Controller
{    
    protected UserRepository $userRespotirory;
    protected ClientRepository $clientRepository;
    public function __construct(UserRepository $userRepository,ClientRepository $clientRepository)
    {
        $this->userRespotirory  = $userRepository;
        $this->clientRepository  = $clientRepository;


    }
    
    public function index(){
        $client=  $this->clientRepository->getUser();
        return view('Admin.Client.index',['data'=>$client]);
    }

    public function create(){
        $client = $this->userRespotirory->getClient();
        return view('Admin.Client.client_create',['data'=>$client]);
    }

    public function store(StoreClientRequest $req){

        $this->clientRepository->insert($req->getInsertTableField());
        return redirect()->route('client.index');
    }
    
    public function profile(){
            return view('Client.profile');   
    }

     public function edit($id)
    {   
        $client = $this->clientRepository->getById($id);
        return view('Admin.Client.edit',compact('client'));
    }

    public function update(UpdateClientRequest $req, $id)
    {       
        // return $req->editname();
        $this->userRespotirory->update($req->user_id,$req->editname());
        $this->clientRepository->update($id,$req->getInsertTableField());
        
        return redirect()->route('client.index')->with('success', 'Client detail updated successfully');
    }

    public function destroy($id)
    {
        $this->clientRepository->destroy($id);
        return redirect()->route('client.index')->with('success', 'Client detail deleted successfully');
    }

}
