
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
        <h1 class="text-3xl font-bold tracking-tight text-gray-900">Project</h1>
        <div class="flex gap-5 ml-auto">
         
        </div>
      </div>
    </header>
    <main>
      <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <h2 class="text-2xl ml-40 mb-4">Add Project</h2>
        
        @if (session('success'))
        <x-AlertSuccess :message="session('success')" />
        @endif
        @if (session('error'))
        <x-AlertSuccess :message="session('error')" />
        @endif

        <form action="{{route('admin.project.store')}}" method="POST" class="max-w-4xl mx-auto p-6 bg-white shadow-md rounded-lg space-y-6">
          @csrf
            <div class="space-y-2">
              <label for="name" class="block text-sm font-medium text-gray-700">Project Name</label>
              <input type="text" id="name" name="name" required class="w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
            </div>
          
            <div class="space-y-2">
              <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
              <textarea id="description" name="description" required class="w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"></textarea>
            </div>
          
            {{-- <div class="space-y-2">
              <label for="client_id" class="block text-sm font-medium text-gray-700">Assign Client</label>
              <select id="client_id" name="client_id" class="w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                @foreach ($clients as $client )
                <option value="{{$client->id}}" >{{$client->name}}</option>
                @endforeach
              </select>
            </div> --}}

            
            <div>
              <label for="client_id" class="block text-sm font-medium text-gray-700">Assign Client</label>
              <div class="mt-1">
                  <select name="client_id" id="client_id" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                      <option value="" {{ old('client_id') ? '' : 'selected' }}>No Client</option>
                      @foreach($clients as $client)
                          <option value="{{ $client->id }}" {{ old('client_id') == $client->id ? 'selected' : '' }}>{{ $client->name }}</option>
                      @endforeach
                  </select>
              </div>
              @error('client_id')
                  <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
              @enderror
          </div>
            
            <div>
              <label for="employee_id" class="block text-sm font-medium text-gray-700">Assign Employee</label>
              <div class="mt-1">
                  <select name="employee_id" id="employee_id" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                      <option value="" {{ old('employee_id') ? '' : 'selected' }}>No Employee</option>
                      @foreach($employees as $employee)
                          <option value="{{ $employee->id }}" 
                              {{ old('employee_id') == $employee->id ? 'selected' : '' }}>
                              {{ $employee->name }}
                          </option>
                      @endforeach
                  </select>
              </div>
              @error('employee_id')
                  <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
              @enderror
          </div>

            <div class="grid grid-cols-2 gap-6">
              <div class="space-y-2">
                <label for="start_date" class="block text-sm font-medium text-gray-700">Start Date</label>
                <input type="date" id="start_date" name="start_date" required class="w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
              </div>
          
              <div class="space-y-2">
                <label for="end_date" class="block text-sm font-medium text-gray-700">End Date</label>
                <input type="date" id="end_date" name="end_date" class="w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
              </div>
            </div>
          
            <div class="flex justify-end">
              <button type="submit" class="px-6 py-3 bg-indigo-600 text-white font-semibold rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50">Submit</button>
            </div>
          
          </form>
          
      </div>
    </main>
  </div>
  
</body>
</html>

  
      </div>
    </main>
  </div>
  
</body>
</html>

  