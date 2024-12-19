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
        <h1 class="text-3xl font-bold tracking-tight text-gray-900">Client</h1>
        <div class="flex gap-5 ml-auto">
          <a href="{{route('admin.client.create')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
            Add Client
          </a>
        
        </div>
      </div>
    </header>
    <main>
      <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <div class="container mx-auto mt-10">
  
          <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Table</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 font-sans">

    <div class="container mx-auto mt-10">
        <h2 class="text-2xl mb-4">Edit Client</h2>

     <form action="{{route('admin.client.update',$client->id)}}" method="POST" class="bg-white p-6 rounded-lg shadow-lg">
            @csrf
            @method('Patch')
            
            <div class="mb-4">
                <label for="user_id" class="block text-gray-600 font-medium mb-2">User ID</label>
                <input 
                    type="text" 
                    name="name" 
                    id="user_id" 
                    class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    value="{{ old('user_id', $client->user->name) }}" 
                >
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <input type="text" name="user_id" value="{{$client->user->id}}" hidden >
            <div class="mb-4">
        <div class="mb-4">
            <label for="company_name" class="block text-gray-600 font-medium mb-2">Company Name</label>
            <input 
                type="text" 
                name="company_name" 
                id="company_name" 
                class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                value="{{ old('company_name', $client->company_name) }}" 
                required
            >
            @error('company_name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Contact Number Field -->
        <div class="mb-4">
            <label for="contact_number" class="block text-gray-600 font-medium mb-2">Contact Number</label>
            <input 
                type="text" 
                name="contact_number" 
                id="contact_number" 
                class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                value="{{ old('contact_number', $client->contact_number) }}" 
                required
            >
            @error('contact_number')
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

  