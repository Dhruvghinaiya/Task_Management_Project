<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @Vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="h-full">
    <!--
  This example requires updating your template:

  ```
  <html class="h-full bg-gray-100">
  <body class="h-full">
  ```
-->
<div class="min-h-full">
    <x-admin-header/>

    <header class="bg-white shadow">
      <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 flex">
        <h1 class="text-3xl font-bold tracking-tight text-gray-900">User</h1>
        <div class="flex gap-5 ml-auto">
        
        </div>
      </div>
    </header>
    <main>
      <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <div class="container mx-auto mt-10">
  
        
    <div class="container mx-auto mt-10">
        <h2 class="text-2xl mb-4">Edit User</h2>
       
        @if (session('success'))
        <x-AlertSuccess :message="session('success')" />
        @endif
      @if (session('error'))
        <x-AlertError :message="session('error')" />
      @endif

     <form action="{{route('admin.user.update',$users->id)}}" method="POST" class="bg-white p-6 rounded-lg shadow-lg">
            @csrf
            @method('Patch')
            
            <input type="text" name="created_by" value="{{$users->created_by}}" hidden>

            <div class="mb-4">
                <label for="name" class="block text-gray-600 font-medium mb-2">Name<span class="text-red-500">*</span></label>
                <input 
                    type="text" 
                    name="name" 
                    id="name" 
                    class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    value="{{ old('name', $users->name) }}" 
                >
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
        <div class="mb-4">
            <label for="email" class="block text-gray-600 font-medium mb-2">Email<span class="text-red-500">*</span></label>
            <input 
                type="text" 
                name="email" 
                id="email" 
                class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                value="{{ old('email', $users->email) }}" 
                
            >
            @error('email')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Contact Number Field -->
        <div class="mb-4">
            <label for="role" class="block text-gray-600 font-medium mb-2">Role<span class="text-red-500">*</span></label>
            <select name="role" id="role" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
              <option value="admin" {{ $users->role == 'admin' ? 'selected' : '' }}>Admin</option>
              <option value="client" {{ $users->role == 'client' ? 'selected' : '' }}>Client</option>
              <option value="employee" {{ $users->role == 'employee' ? 'selected' : '' }}>Employee</option>

          </select>
            @error('role')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <input type="submit" value="Edit"  class=" inline-block bg-blue-500 text-white px-4 py-2  mt-2 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400"/>
        
        
    </div>

</body>

</html>

      </div>
      </div>
    </main>
  </div>
  
</body>
</html>

  