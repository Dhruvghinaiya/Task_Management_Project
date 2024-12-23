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
        <h1 class="text-3xl font-bold tracking-tight text-gray-900">task Details</h1>
      </div>
    </header>
    <main>
      <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">

        <div class="container mx-auto p-6">
            <!-- Task Details Card -->
            <div class="bg-white p-8 rounded-lg shadow-md">
                <h2 class="text-3xl font-semibold text-gray-800 mb-4">Task Details</h2>
        
                <!-- Task Name and Status -->
                <div class="mb-6">
                    <h3 class="text-2xl font-bold text-gray-700">{{ $task->name }}</h3>
                    <p class="text-sm mt-2 
                        @if($task->status == 'pending') text-yellow-500 
                        @elseif($task->status == 'in_progress') text-blue-500 
                        @else text-green-500 @endif">
                        Status: {{ ucfirst($task->status) }}
                    </p>
                </div>
        
                <!-- Task Description -->
                <div class="mb-6">
                    <h4 class="text-xl font-semibold text-gray-700">Description</h4>
                    <p class="text-gray-600 mt-2">{{ $task->description ?? 'No description available' }}</p>
                </div>
        
                <!-- Project and Assigned User -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <h4 class="text-xl font-semibold text-gray-700">Project</h4>
                        <p class="text-gray-600 mt-2">{{ $task->project->name ?? 'No project assigned' }}</p>
                    </div>
                    <div>
                         <h4 class="text-xl font-semibold text-gray-700">Assigned To</h4> 
                        <p class="text-gray-600 mt-2">{{ $task->assignedUser? $task->assignedUser->name : 'Not assigned' }}</p> 
                        
                    </div>
                </div>
        
                <!-- Dates -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <h4 class="text-xl font-semibold text-gray-700">Start Date</h4>
                        <p class="text-gray-600 mt-2">{{ $task->start_date ? $task->start_date->format('M d, Y') : 'Not set' }}</p>
                    </div>
                    <div>
                        <h4 class="text-xl font-semibold text-gray-700">End Date</h4>
                        <p class="text-gray-600 mt-2">{{ $task->end_date ? $task->end_date->format('M d, Y') : 'Not set' }}</p>
                    </div>
                </div>
        
                <!-- Created By and Updated By -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <h4 class="text-xl font-semibold text-gray-700">Created By</h4>
                        <p class="text-gray-600 mt-2">{{ $task->createdBy->name }}</p>
                    </div>
                    <div>
                        <h4 class="text-xl font-semibold text-gray-700">Updated By</h4>
                        <p class="text-gray-600 mt-2">{{ $task->updatedBy->name }}</p>
                    </div>
                </div>
        
  <!-- Action Buttons -->
  <div class="mt-8 flex justify-end items-center space-x-4">
    <!-- Edit Button -->
    <a href="{{ route('admin.task.edit', $task->id) }}" class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-300 ease-in-out text-center w-full sm:w-auto">
        Edit Task
    </a>

    <!-- Delete Button -->
    <form action="{{ route('admin.task.delete', $task->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this task?');" class="w-full sm:w-auto">
        @csrf
        @method('DELETE')
        <button type="submit" class="px-6 py-3 bg-red-600 text-white rounded-lg hover:bg-red-700 transition duration-300 ease-in-out text-center w-full sm:w-auto">
            Delete Task
        </button>
    </form>
                <a href="{{ route('admin.task.index') }}" class="px-6 py-3 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition duration-300 ease-in-out text-center w-full sm:w-auto">
                    Back to Task List
                </a>
                
            </div>
            </div>
        </div>
        

      </div>
    </main>
  </div>
  
</body>
</html>

  