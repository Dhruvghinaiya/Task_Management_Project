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
        <div class="max-w-md mx-auto bg-white border rounded px-8 pt-6 pb-8 mb-4">
            <h2 class="text-2xl font-bold mb-6 text-gray-700">Add Client</h2>
            
            <form action="{{route('admin.client.store')}}" method="POST" class="space-y-4">
                @csrf
              <!-- User ID (Foreign Key, Dropdown) -->
              <div>
                <label for="user_id" class="block text-gray-700 font-medium mb-2">User</label>
                <select name="user_id" id="user_id" 
                  class="w-full px-4 py-2 border rounded-lg text-gray-700 focus:ring-2 focus:ring-blue-500">
                  <option value="" disabled selected>Select a user</option>
                  <!-- Loop through users -->
                  @foreach ($data as $client)
                    <option value="{{$client->id}}">{{$client->name}}</option>
                  @endforeach
                </select>
                @error('user_id')
                <span style="color: red">{{$message}}</span>
            @enderror
              </div>
              
              <!-- Company Name -->
              <div>
                <label for="company_name" class="block text-gray-700 font-medium mb-2">Company Name</label>
                <input 
                  type="text" 
                  name="company_name" 
                  id="company_name" 
                  class="w-full px-4 py-2 border rounded-lg text-gray-700 focus:ring-2 focus:ring-blue-500"
                  placeholder="Enter company name" 
                  value="{{ old('company_name') }}" 
                  required>
              </div>
              @error('company_name')
              <span style="color: red">{{$message}}</span>
          @enderror
              
              <!-- Contact Number -->
              <div>
                <label for="contact_number" class="block text-gray-700 font-medium mb-2">Contact Number</label>
                <input 
                  type="text" 
                  name="contact_number" 
                  id="contact_number" 
                  class="w-full px-4 py-2 border rounded-lg text-gray-700 focus:ring-2 focus:ring-blue-500"
                  placeholder="Enter contact number" 
                  value="{{ old('contact_number') }}" 
                  required>
              </div>
              @error('contact_number')
              <span style="color: red">{{$message}}</span>
          @enderror
              
              {{-- <!-- Created At (Hidden) -->
              <input type="hidden" name="created_at" value="{{ now() }}">
              
              <!-- Updated At (Hidden) -->
              <input type="hidden" name="updated_at" value="{{ now() }}">
          
              <!-- Submit Button --> --}}
              <div>
                <button 
                  type="submit" 
                  class="w-full bg-blue-500 text-white font-medium py-2 px-4 rounded-lg hover:bg-blue-600 focus:ring-2 focus:ring-blue-500">
                  Save
                </button>
              </div>
            </form>
          </div>
          
      </div>
    </main>
  </div>
  
</body>
</html>

  