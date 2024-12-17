<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

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
       
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8', // Password must be at least 8 characters
            'role' => 'required|in:admin,employee,client', 
        ];

    }
    public function getinsertTableField():array
    {
        return [
            'id' => \Illuminate\Support\Str::uuid(),
            'name' => $this->input('name'),
            'email' => $this->input('email'),
            'password' => bcrypt($this->input('password')), // Always hash passwords
            'role' => $this->input('role'),
            'created_by' => null, // Get the currently authenticated user's ID
            'updated_by' => null, // No updater during creation
        ];
    }
}
