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
          <a href="{{route('admin.task.create')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
            Add Task
          </a>
         
        </div>
      </div>
    </header>
    <main>
      <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <div class="mb-4">

          @if (session('success'))
          <x-AlertSuccess :message="session('success')" />
          @endif
          @if (session('error'))
          <x-AlertSuccess :message="session('error')" />
          @endif
        </div>

        <div class="container mx-auto p-6">
                <!-- Task Cards Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($tasks as $task)
                        <div class="bg-white p-6 rounded-lg shadow-md border">
                            <!-- Task Card Content -->
                            <h3 class="text-xl font-semibold text-gray-800">{{ $task->name }}</h3>
                            <p class="text-gray-600 mt-2">{{ \Str::limit($task->description, 100) }}</p>
            
                            <!-- Task Status -->
                            <div class="mt-4">
                                <span class="inline-block text-sm font-medium 
                                    @if($task->status == 'pending') text-yellow-500 @elseif($task->status == 'in_progress') text-blue-500 @else text-green-500 @endif">
                                    {{ ucwords(str_replace('_',' ',$task->status)) }}
                                </span>
                            </div>
            
                            <!-- Action Button -->
                            <div class="mt-6 text-right">
                                <a href="{{route('admin.task.show',$task->id)}}" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
                                    View Details
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            

            </div> 
        
    
          </div>
        </div>
        

      </div>
    </main>
  </div>
  
</body>
</html>

  