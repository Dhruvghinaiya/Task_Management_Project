
@php
    use App\Enums\RoleEnum;
@endphp<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @Vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="h-full">
    
<div class="min-h-full">
    <x-admin-header/>
    <header class="bg-white shadow">
      <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold tracking-tight text-gray-900">Add user</h1>
      </div>
    </header>
    <main>
      <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">

        
        @if (session('success'))
        <x-AlertSuccess :message="session('success')" />
        @endif
        @if (session('error'))
        <x-AlertError :message="session('error')" />
        @endif

        <div class="flex min-h-full flex-col justify-center px-6 lg:px-8 ">
          <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            {{-- <img class="mx-auto h-10 w-auto" src="https://tailwindui.com/plus/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company"> --}}
            <h2 class="text-center text-2xl/9 font-bold tracking-tight text-gray-900">Sign Up to your account</h2>
          </div>
          <div class=" sm:mx-auto sm:w-full sm:max-w-sm">
            <form class="space-y-6" action="{{route('user.store')}}" method="POST">
              @csrf
              
              <div>
                  <label for="name" class="block text-sm/6 font-medium text-gray-900">Name<span class="text-red-500">*</span></label>
                  <div class="mt-2">
                    <input type="text" name="name" value="{{old('name')}}" id="name" autocomplete="name"  class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                    <x-form-error name='name'/>  
                  </div>
                </div>
                <div>
                  <label for="email" class="block text-sm/6 font-medium text-gray-900">Email<span class="text-red-500">*</span> </label>
                  <div class="mt-2">
                    <input type="email" name="email" id="email" value="{{old('email')}}" autocomplete="email"  class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                    <x-form-error name='email'/>  

                  </div>
                </div>
                
        
              <div>
                <div class="flex items-center justify-between">
                  <label for="password" class="block text-sm/6 font-medium text-gray-900">Password<span class="text-red-500">*</span></label>
                </div>
                <div class="mt-2">
                  <input type="password" name="password" value="{{old('password')}}" id="password" autocomplete="current-password" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                </div>
                <x-form-error name='password'/>  

              </div>
              <div>
                  <label for="email" class="block text-sm/6 font-medium text-gray-900">Role<span class="text-red-500">*</span></label>
                  <div class="mt-2">
                    {{-- <input type="email" name="email" id="email" autocomplete="email"  class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"> --}}
                    <select name="role" id="role" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                      @foreach (RoleEnum::cases() as $case )
                      <option value="{{$case}}">{{$case}}</option>
                      @endforeach
                    </select>
                   
                  </div>
                </div>
      
              <div>
                <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Add user</button>
              </div>
              <div>
                  <a href="{{route('admin.dashboard')}}" class="flex w-full justify-center rounded-md bg-red-400 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-yellow-600">Back</a>
                </div>
            </form>
        
           
          </div>
        </div>
      
      </div>
    </main>
  </div>
  
</body>
</html>

  