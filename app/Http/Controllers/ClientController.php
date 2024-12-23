<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\Client_Detail;
use App\Models\User;
use App\Repositories\ClientRepository;
use App\Repositories\UserRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Throwable;

class ClientController extends Controller
{    
    protected UserRepository $userRepository;
    protected ClientRepository $clientRepository;
    public function __construct(UserRepository $userRepository,ClientRepository $clientRepository)
    {
        $this->userRepository  = $userRepository;
        $this->clientRepository  = $clientRepository;


    }
    
    public function index(){
        $clients=  $this->clientRepository->getUser();
        
        return view('Admin.Client.index',compact('clients'));
    }

    public function show(){
        $clients = $this->userRepository->getClient();
        return view('Admin.Client.show',compact('clients'));
    }

    public function create(){
        $client = $this->userRepository->getClient();
        return view('Admin.Client.client_create',['data'=>$client]);
    }

    public function store(StoreClientRequest $req){
        DB::beginTransaction();
        try{
            $this->clientRepository->insert($req->getInsertTableField());
            DB::commit();
            return redirect()->route('admin.client.index')->with('success','client add successfully');
        }
        catch(Throwable $e){
            DB::rollBack();
            return redirect()->route('admin.client.index')->with('error',$e->getMessage());
        }
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
        DB::beginTransaction();
        try{

            $this->userRepository->update($req->user_id,$req->editname());
            $this->clientRepository->update($id,$req->getInsertTableField());
            DB::commit();
            return redirect()->route('admin.client.index')->with('success', 'Client detail updated successfully');
        }
        catch(Throwable $e){
            DB::rollBack();
            return redirect()->route('admin.client.index')->with('error', $e->getMessage());
        }
        
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        try{
            $this->clientRepository->destroy($id);
            DB::commit();
            return redirect()->route('admin.client.index')->with('success', 'Client detail deleted successfully');
        }
        catch(Throwable $e){            
            DB::rollBack();
            return redirect()->route('admin.client.index')->with('error', $e->getMessage());
        }
    }

}
