<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>user</title>
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
          <a href="{{route('admin.user.create')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
            Add New User
          </a>
         
        </div>
      </div>
    </header>
    <main>
      <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <div class="container mx-auto">
            <h1 class="text-3xl font-bold text-center mb-6">Users</h1>
            <div class="mb-3">

              @if (session('success'))
              <x-AlertSuccess :message="session('success')" />
              @endif
              @if (session('error'))
              <x-AlertError :message="session('error')" />
              @endif
            </div>
            <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-md">
                <thead>
                    <tr>
                        <th class="py-2 px-4 text-left text-gray-700">Name</th>
                        <th class="py-2 px-4 text-left text-gray-700">Email</th>
                        <th class="py-2 px-4 text-left text-gray-700">Role</th>
                        <th class="py-2 px-4 text-center text-gray-700">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr class="border-t">
                        <td class="py-2 px-4 text-gray-700">{{ $user->name }}</td>
                        <td class="py-2 px-4 text-gray-700">{{ $user->email }}</td>
                        {{-- <td class="py-2 px-4  text-gray-700">                        
                          {{ ucfirst($user->role) }}
                        </td> --}}
                        
                          <td class="py-2 px-4 text-gray-700 
                            @if($user->role == 'admin') text-red-500 
                            @elseif($user->role == 'employee') text-green-500 
                            @else text-blue-600
                            @endif">
                            {{ ucfirst($user->role) }}
                        </td>

                        <td class="py-2 px-4 text-center">
                            <!-- Edit Button -->
                            <a href="{{route('admin.user.edit',$user->id)}}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-700">Edit</a>
                            
                            <!-- Delete Button -->
                            <form action="{{ route('admin.user.destroy', $user->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-700">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
      </div>
    </main>
  </div>
  
</body>
</html>

  