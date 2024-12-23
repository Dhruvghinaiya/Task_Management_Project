<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
class UpdateProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'=>'required',
            'description'=>'required',
            'client_id'=>'required',
            'start_date'=>'required',
            'end_date'=>'required|after_or_equal:start_date',
        ];
    }

    public function getInsertTableField(){
        return [
            'name' => $this->input('name'),
            'description' => $this->input('description'),   
            'client_id' => $this->input('client_id'),
            'created_by' => $this->input('created_by'),  
            'updated_by' => Auth::user()->id, 
            'start_date' => $this->input('start_date'),
            'end_date' => $this->input('end_date'),
        ];
    }
}
