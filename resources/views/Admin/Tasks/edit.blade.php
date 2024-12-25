<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task</title>
    @Vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="h-full">
 
<div class="min-h-full">
    <x-admin-header/>
    
    <header class="bg-white shadow">
      <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 flex">
        <h1 class="text-3xl font-bold tracking-tight text-gray-900">Task</h1>
        <div class="flex gap-5 ml-auto">
         
         
        </div>
      </div>
    </header>
    <main>
      <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <div class="bg-white p-8 rounded-lg shadow-md">
                    
        <form action="{{ isset($task) ? route('admin.task.update', $task->id) : route('tasks.store') }}" method="POST">
            @csrf
            @if(isset($task))
                @method('patch') <!-- For edit form, use PUT method -->
            @endif

            <!-- Task Name -->
            <div class="mb-6">
                <label for="name" class="block text-xl font-semibold text-gray-700">Task Name<span class="text-red-500">*</span></label>
                <input type="text" name="name" id="name" value="{{ old('name', $task->name ?? '') }}" class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" >
                @error('name')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Task Description -->
            <div class="mb-6">
                <label for="description" class="block text-xl font-semibold text-gray-700">Description<span class="text-red-500">*</span></label>
                <textarea name="description" id="description" rows="4" class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('description', $task->description ?? '') }}</textarea>
                @error('description')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Task Status -->
            <div class="mb-6">
                <label for="status" class="block text-xl font-semibold text-gray-700">Status<span class="text-red-500">*</span></label>
                <select name="status" id="status" class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" >
                    <option value="pending" {{ old('status', $task->status ?? '') == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="in_progress" {{ old('status', $task->status ?? '') == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                    <option value="completed" {{ old('status', $task->status ?? '') == 'completed' ? 'selected' : '' }}>Completed</option>
                </select>
                @error('status')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Project ID -->
            <div class="mb-6">
                <label for="project_id" class="block text-xl font-semibold text-gray-700">Project<span class="text-red-500">*</span></label>
                <select name="project_id" id="project_id" class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" >
                    <!-- You would dynamically load projects here -->
                    @foreach($projects as $project)
                        <option value="{{ $project->id }}" {{ old('project_id', $task->project_id ?? '') == $project->id ? 'selected' : '' }}>
                            {{ $project->name }}
                        </option>
                    @endforeach
                </select>
                @error('project_id')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

           

            <div>
                <label for="assigned_to" class="block text-xl font-semibold text-gray-700">Assigned To<span class="text-red-500">*</span></label>
            
                <select name="assigned_to" id="assigned_to"
                    class="mt-1 block w-full p-3 rounded-lg border-gray-300 focus:ring-2 focus:ring-indigo-500 transition duration-300 @error('assigned_to') border-red-500 @enderror">
                    @foreach ($clients as $client)
                        <option value="{{ $client->id }}"
                            {{ old('assigned_to', $task->assigned_to) == $client->id ? 'selected' : '' }}>
                            {{ $client->name }}</option>
                    @endforeach
                </select>
                @error('assigned_to')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Start Date -->
            <div class="mb-6 grid grid-cols-1 mt-3 md:grid-cols-2 gap-6">
                <!-- Start Date -->
                <div>
                    <label for="start_date" class="block text-xl font-semibold text-gray-700">Start Date<span class="text-red-500">*</span></label>
                    <input type="date" name="start_date" id="start_date"  value="{{($task->start_date)->format('Y-m-d') }}" class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('start_date')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>
            
                <!-- End Date -->
                <div>
                    <label for="end_date" class="block text-xl font-semibold text-gray-700">End Date<span class="text-red-500">*</span></label>
                    <input type="date" name="end_date" id="end_date"  value="{{($task->end_date)->format('Y-m-d') }}"  class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('end_date')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Submit Button -->
            <div class="mt-8 flex justify-end">
                <button type="submit" class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-300 ease-in-out">
                    {{ isset($task) ? 'Update Task' : 'Create Task' }}
                </button>
            </div>

            <input type="text" name="created_by" value="{{$project->created_by}}" hidden>
        </form>

        </div>
      </div>
    </main>
  </div>
  
</body>
</html>

  