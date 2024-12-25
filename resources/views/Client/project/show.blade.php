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
    <x-client-header/>

    <header class="bg-white shadow">
      <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 flex">
        <h1 class="text-3xl font-bold tracking-tight text-gray-900">Project Details</h1>
      </div>
    </header>
    <main>
      <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <div class="bg-white p-8 rounded-lg shadow-md border">
            <h2 class="text-2xl font-semibold text-gray-800">{{ $project->name }}</h2>
            
            <p class="text-gray-600 mt-4 text-lg">
              <strong>Description:</strong> {{ $project->description }}
            </p>
            

            <p class="text-gray-600 mt-4 text-lg">
                <strong>Created By:</strong> {{ $project->creator->name }}
              </p>

              <p class="text-gray-600 mt-4 text-lg">
                <strong>Updated By:</strong> {{ $project->updater->name }}
              </p>


            
            <p class="mt-4 text-sm text-gray-500 ">
              <strong>Start Date:</strong> {{ $project->start_date->format('M d, Y') }}
            </p>
            
            
            <p class="mt-2 text-sm text-gray-500">
              <strong>End Date:</strong> {{$project->end_date->format('M d,Y') }}
            </p>
            <p class="mt-4 text-sm text-gray-500 ">
              {{-- <strong>Client Name:</strong> {{ $client->name }} --}}
            </p>
            
            
            
            <!-- Back Button -->
            <div class="mt-6">
              <a href="{{ route('client.project.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition duration-200">
                Back to Projects
              </a>
            </div>
          </div>
          <div class="mt-8">
            <h2 class="text-2xl font-semibold text-gray-900 mb-4">Tasks</h2>
    <div class="bg-gray-50 rounded-lg p-4">
    @if($project->tasks->count() > 0)
        <div class="grid gap-4 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($project->tasks as $task)
                <div class="bg-white p-4 rounded-lg shadow">
                    <h3 class="font-semibold text-lg text-gray-900">{{ $task->name }}</h3>
                    <p class="text-gray-600 mt-1">{{ $task->description }}</p>
                    <div class="mt-2 flex justify-between items-center">
                        <span class="px-2 py-1 text-xs font-semibold rounded-full 
                            {{ $task->status === 'completed' ? 'bg-green-100 text-green-800' : 
                            ($task->status === 'in_progress' ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800') }}">
                            {{ ucfirst($task->status) }}
                        </span>
                        <span class="text-sm text-gray-500">
                            {{ $task->assignedUser ? $task->assignedUser->name : 'Unassigned' }}
                        </span>
                    </div>
                    <p class="text-xs text-gray-400 mt-2">Created: {{ $task->created_at->format('M d, Y') }}</p>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-gray-600">No tasks assigned to this project yet.</p>
    @endif
    </div>
    </div>

<div class="mt-8">
    <h2 class="text-2xl font-semibold text-gray-900 mb-4">Project Employees</h2>
    <div class="bg-gray-50 rounded-lg p-4">
        @if($project->users->count() > 0)
            <div class="grid gap-4 grid-cols-2 sm:grid-cols-3 lg:grid-cols-4">
                @foreach ($project->users as $user)
                    <div class="bg-white p-3 rounded-lg shadow text-center">
                        <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-2">
                            <span class="text-2xl font-semibold text-blue-600">{{ strtoupper(substr($user->name, 0, 2)) }}</span>
                        </div>
                        <p class="font-medium text-gray-900">{{ $user->name }}</p>
                        <p class="text-sm text-gray-600">{{ ucfirst($user->role) }}</p>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-gray-600">No employees assigned to this project yet.</p>
        @endif
    </div>
</div>

<!-- Client Details -->
@if ($project->client && $project->client->clientDetail)
    <div class="mt-8">
        <h2 class="text-2xl font-semibold text-gray-900 mb-4">Client Details</h2>
        <div class="bg-gray-50 rounded-lg p-4">
            <p><span class="font-medium text-gray-600">Company Name:</span> {{ $project->client->clientDetail->company_name }}</p>
            <p class="mt-2"><span class="font-medium text-gray-600">Contact Number:</span> {{ $project->client->clientDetail->contact_number }}</p>
        </div>
    </div>
@endif
</div>
</div>

      </div>

    </main>
  </div>
  
</body>
</html>

  