<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\ClientDetail;
use App\Models\User;
use App\Repositories\ClientRepository;
use App\Repositories\UserRepository;
use Exception;
use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Throwable;

class ClientController extends BaseController
{    
    protected UserRepository $userRepository;
    protected ClientRepository $clientRepository;
    public function __construct(UserRepository $userRepository,ClientRepository $clientRepository)
    {
        $this->userRepository  = $userRepository;
        $this->clientRepository  = $clientRepository;


    }
    
    public function index(){
        $role = Auth::user()->role;
        $clients = $this->userRepository->getClient();
        return view('Admin.Client.index',compact('clients','role'));
    }

    public function show(){
        return view('Admin.Client.show',compact('clients'));
    }

    public function create(){
        $client = $this->userRepository->getClient();
        return view('Admin.Client.client_create',['data'=>$client]);
    }
    
    public function store(StoreClientRequest $req){
        
        
        DB::beginTransaction();
        try{
             $this->userRepository->store($req->getInsertTableFiel1());
              $this->clientRepository->store($req->getInsertTableField2());
            DB::commit();
            return $this->sendRedirectResponse(route('admin.client.index'),'Client add successfully');
        }
        catch(Throwable $e){
            DB::rollBack();
            return $this->sendRedirectBackError($e->getMessage());
        }
    }
    
    public function profile(){
            return view('Client.profile');   
    }

     public function edit($id)
    {     
         $user = $this->userRepository->getById($id);
         $clients = $this->clientRepository->getClient($id);
        return view('Admin.Client.edit',compact('user','clients'));
    }

    public function update(UpdateClientRequest $req, $id)
    {   
       

        DB::beginTransaction();
        try{

            $this->userRepository->update($req->user_id,$req->getInsertTableFiel1());
            $this->clientRepository->update($req->client_id,$req->getInsertTableField2());
            DB::commit();
            // return redirect()->route('admin.client.index')->with('success', 'Client detail updated successfully');
            return $this->sendRedirectResponse(route('admin.client.index'),'Client Update Successsfully...');
        }
        catch(Throwable $e){
            DB::rollBack();
            return $this->sendRedirectBackError($e->getMessage());
        }
        
    }

    public function destroy($id)
    {   
        DB::beginTransaction();
        try{
            $this->userRepository->destroy($id);
            $this->clientRepository->getClient($id);
            DB::commit();
            return $this->sendRedirectResponse(route('admin.client.index'),'Client Delete Successfully');
        }
        catch(Throwable $e){            
            DB::rollBack();
            return $this->sendRedirectBackError($e->getMessage());
        }
    }

}
