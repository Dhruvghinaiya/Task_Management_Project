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
  
<div class="min-h-full">
    <x-admin-header/>

    <header class="bg-white shadow">
      <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 flex">
        <h1 class="text-3xl font-bold tracking-tight text-gray-900">Project Edit</h1>
      </div>
    </header>
    <main>
      <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        @if (session('message'))
        @php 
            $message = session('message');
        @endphp
        <div id="alert-message" class="alert-container">
            @if($message['status'] == 'success')
                <x-AlertSuccess :message="$message['description']" />
            @elseif($message['status'] == 'error')
                <x-AlertError :message="$message['description']" />
            @endif
        </div>

        <script>
            // Set a timeout to remove the alert after 3 seconds
            setTimeout(function() {
                var alertMessage = document.getElementById('alert-message');
                if (alertMessage) {
                    alertMessage.style.display = 'none'; // Hide the alert
                }
            }, 3000); 
        </script>
    @endif
        <div class="bg-white p-8 rounded-lg shadow-md border">
            <form action="{{route('admin.project.update',$project->id)}}" method="POST">
                @csrf
                @method('patch')
            
            <input type="text" name="created_by" value="{{$project->created_by}}" hidden>

              <!-- Project Name -->
              <div class="mt-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Project Name<span class="text-red-500">*</span></label>
                <input type="text" id="name" name="name" value="{{ old('name',  $project->name) }}" 
                  class="mt-1 block w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" >
                @error('name')
                  <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
              </div>
          
              <!-- Project Description -->
              <div class="mt-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Project Description<span class="text-red-500">*</span></label>
                <textarea id="description" name="description" rows="4" 
                  class="mt-1 block w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" >{{ old('description', isset($project) ? $project->description : '') }}</textarea>
                @error('description')
                  <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
              </div>

              <div class="space-y-2">
                <label for="client_id" class="block text-sm font-medium text-gray-700">Assign Client<span class="text-red-500">*</span></label>
                <select id="client_id" name="client_id" class="w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                  @foreach ($clients as $client)
                    <option value="{{$client->id}}" 
                      @if($client->id == old('client_id', $client->id)) selected @endif>
                      {{$client->name}}
                    </option>
                  @endforeach
                </select>
              </div>

              
                <!-- Displaying validation error -->
                @error('client_id')
                  <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror


                
              {{-- <div class="space-y-2">
                <label for="employee_id" class="block text-sm font-medium text-gray-700">Assign Employee</label>
                <select id="employee_id" name="employee_id" class="w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                  @foreach ($employees as $employee)
                    <option value="{{$employee->id}}" 
                      @if($client->id == old('employee_id', $employee->id)) selected @endif>
                      {{$employee->name}}
                    </option>
                  @endforeach
                </select>
              </div> --}}

              {{-- <div class="space-y-4">
                <label class="block text-sm font-medium text-gray-700">Assign Employees</label>
    
                <div class="mt-1 space-y-2 max-h-16 overflow-y-auto p-1 ">
                    @foreach ($employees as $employee)
                        <div class="flex items-center space-x-3">
                            <input type="checkbox" name="employee_ids[]" value="{{ $employee->id }}"
                                id="employee_{{ $employee->id }}"
                                {{ in_array($employee->id, old('employee_ids', [])) ? 'checked' : '' }}
                                class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                            <label for="employee_{{ $employee->id }}"
                                class="text-sm text-gray-700">{{ $employee->name }}</label>
                        </div>
                    @endforeach
                </div>
                @error('employee_ids')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div> --}}

            <div class="space-y-4 ">
              <label class="block text-sm font-medium text-gray-700">Assign Employees<span class="text-red-500">*</span></label>
              <div class=" max-h-16 overflow-y-auto p-1">
                  @foreach ($employees as $employee)
                      <div class="flex items-center space-x-3">
                          <input type="checkbox" name="employee_ids[]" value="{{ $employee->id }}"
                              id="employee_{{ $employee->id }}"
                              {{ in_array($employee->id, old('employee_ids', $project->users->pluck('id')->toArray())) ? 'checked' : '' }}
                              class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                          <label for="employee_{{ $employee->id }}"
                              class="text-sm text-gray-700">{{ $employee->name }}</label>
                      </div>
                  @endforeach
              </div>

              @error('employee_ids')
                  <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
              @enderror
          </div>
            

                    @error('employee_id')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                    <div class="mt-4">
                        <label for="start_date" class="block text-sm font-medium text-gray-700">Start Date<span class="text-red-500">*</span></label>
                        <input type="date" id="start_date" name="start_date" 
                        value="{{ \Carbon\Carbon::parse($project->start_date)->format('Y-m-d') }}"
                        class="mt-1 block w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" >
                        @error('start_date')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- End Date -->
                    <div class="mt-4">
                        <label for="end_date" class="block text-sm font-medium text-gray-700">End Date<span class="text-red-500">*</span></label>
                        <input type="date" id="end_date" name="end_date" 
                        value="{{ old('end_date', isset($project) ? \Carbon\Carbon::parse($project->end_date)->format('Y-m-d') : '') }}"
                        class="mt-1 block w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" >
                        @error('end_date')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Action Buttons -->
                    <div class="mt-6 flex space-x-4">
                        <!-- Save Button -->
                <input type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition duration-200"/>
                
                
                <!-- Cancel Button -->
                <a href="{{ route('admin.project.show',$project->id) }}" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition duration-200">
                    Cancel
                </a>
            </div>
        </div>
        </div>
            </form>
          </div>
          
      </div>
    </main>
  </div>
  
</body>
</html>

  