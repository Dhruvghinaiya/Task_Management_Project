<?php

namespace App\Http\Requests;

use App\Enums\RoleEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Enum;

class RegisterUserRequest extends FormRequest
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
    //    dd($this);   
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8', // Password must be at least 8 characters
            'role' => 'required',new Enum(RoleEnum::class), 
        ];

    }
    public function getinsertTableField():array
    {
        // dd(Auth::user()->id);
        return [
            // 'id' => \Illuminate\Support\Str::uuid(),
            'name' => $this->input('name'),
            'email' => $this->input('email'),
            'password' => bcrypt($this->input('password')), // Always hash passwords
            'role' => $this->input('role'),
            'created_by' => Auth::user()->id, // Get the currently authenticated user's ID
            'updated_by' => null,
        ];
    }
}
