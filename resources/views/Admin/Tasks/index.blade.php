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
        <h1 class="text-3xl font-bold tracking-tight text-gray-900">Task</h1>
        <div class="flex gap-5 ml-auto">
          <a href="{{route('admin.task.create')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
            Add Task
          </a>
         
        </div>
      </div>
    </header>
    <main>
      <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
{{--         
        <div class="container mx-auto py-8">
          <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Task Card 1 -->
             <div class="bg-white p-6 rounded-lg shadow-lg border">
              <h3 class="text-xl font-semibold text-gray-800">{{ $task->name }}</h3>
              <p class="text-gray-600 mt-2">{{ \Illuminate\Support\Str::limit($task->description, 100) }}</p>
        
              <div class="mt-4 text-sm text-gray-500">
                <p><strong>Status:</strong> <span class="capitalize">{{ $task->status }}</span></p>
                <p><strong>Start Date:</strong> {{ $task->start_date }}</p>
                <p><strong>End Date:</strong> {{ $task->end_date }}</p>
              </div> --}}
        
              {{-- <div class="mt-4">
                <span class="text-sm text-gray-500">Created by: {{ $task->createdBy->name }}</span>
              </div> --}}
            </div> 
        
    
          </div>
        </div>
        

      </div>
    </main>
  </div>
  
</body>
</html>

  