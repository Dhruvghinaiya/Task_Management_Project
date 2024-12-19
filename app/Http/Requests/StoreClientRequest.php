<?php

namespace App\Http\Requests;
use Illuminate\Support\Str;
use Illuminate\Foundation\Http\FormRequest;

class StoreClientRequest extends FormRequest
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
            'user_id'=>'required',
            'company_name'=>'required',
            'contact_number'=>'required|numeric|digits:10',
        ];
    }

    
    public function getInsertTableField(){
        return [
            'id'=>Str::uuid(),
            'user_id'=>$this->input('user_id'),
            'company_name'=>$this->input('company_name'),
            'contact_number'=>$this->input('contact_number'),
        ];
    }
}
