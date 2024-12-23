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
      <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold tracking-tight text-gray-900">Dashboard</h1>
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
  <!-- Dashboard Cards -->
  <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    
    <!-- Task Card -->
    <a href="{{route('admin.task.index')}}" class="card bg-white min-h-[150px] p-6 rounded-lg border hover:shadow-xl transition-all duration-300 transform hover:scale-105">
      <h2 class="text-xl font-semibold text-gray-700">Total Tasks</h2>
      <p class="text-3xl font-bold text-blue-500">{{$taskCount}}</p>
      <p class="text-gray-500">View All Tasks</p>
    </a>

    <!-- Project Card -->
    <a href="{{route('admin.project.index')}}" class="card bg-white p-6 rounded-lg border hover:shadow-xl transition-all duration-300 transform hover:scale-105">
      <h2 class="text-xl font-semibold text-gray-700">Total Projects</h2>
      <p class="text-3xl font-bold text-green-500">{{$projectCount}}</p>
      <p class="text-gray-500">View All Projects</p>
    </a>

    <!-- Client Card -->
    <a href="{{route('admin.client.show')}}" class="card bg-white p-6 rounded-lg border hover:shadow-xl transition-all duration-300 transform hover:scale-105">
      <h2 class="text-xl font-semibold text-gray-700">Total Clients</h2>
      <p class="text-3xl font-bold text-purple-500">{{$clientCount}}</p>
      <p class="text-gray-500">View All Clients</p>
    </a>
  
  </div>
</div>

      </div>
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Recent Projects -->
        <div class="bg-white rounded-lg shadow-md  border overflow-hidden">
            <div class="p-6">
                <h2 class="text-2xl font-semibold text-gray-800 mb-4">Recent Projects</h2>
                <div class="space-y-4">
                    @foreach($recentProjects as $project)
                    <div class="bg-gray-50 rounded-lg p-4">
                        <h3 class="text-lg font-semibold text-gray-800">{{ $project->name }}</h3>
                        <div class="mt-2 flex justify-between text-sm text-gray-600">
                            <span>Client: {{ $project->client->name }}</span>
                            <span>Tasks: {{ $project->tasks->count() }}</span>
                        </div>
                        <div class="mt-1 text-sm text-gray-500">
                            End Date: {{ $project->end_date->format('M d, Y') }}
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    
        <!-- Recent Tasks -->
        <div class="bg-white rounded-lg shadow-md border overflow-hidden">
            <div class="p-6">
                <h2 class="text-2xl font-semibold text-gray-800 mb-4">Recent Tasks</h2>
                <div class="space-y-4">
                    @foreach($recentTasks as $task)
                    <div class="bg-gray-50 rounded-lg p-4">
                        <h3 class="text-lg font-semibold text-gray-800">{{ $task->name }}</h3>
                        <div class="mt-2 flex justify-between text-sm text-gray-600">
                            <span>Project: {{ $task->project->name }}</span>
                            <span>Assigned: {{ $task->assignedUser->name }}</span>
                        </div>
                        <div class="mt-1 flex items-center">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-{{ $task->status === 'completed' ? 'green' : 'yellow' }}-100 text-{{ $task->status === 'completed' ? 'green' : 'yellow' }}-800">
                                {{ ucfirst($task->status) }}
                            </span>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    
        <!-- Recent Clients -->
        <div class="bg-white rounded-lg shadow-md border overflow-hidden mb-24">
            <div class="p-6">
                <h2 class="text-2xl font-semibold text-gray-800 mb-4">Recent Clients</h2>
                <div class="space-y-4">
                    @foreach($recentClients as $client)
                    <div class="bg-gray-50 rounded-lg p-4">
                        <h3 class="text-lg font-semibold text-gray-800">{{ $client->name }}</h3>
                        <div class="mt-2 text-sm text-gray-600">
                            <p>Email: {{ $client->email }}</p>
                            <p>Company: {{ $client->clientDetail->company_name ?? 'N/A' }}</p>
                            <p>Contact: {{ $client->clientDetail->contact_number ?? 'N/A' }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    
        <!-- Recent Employees -->
        <div class="bg-white rounded-lg shadow-md border overflow-hidden mb-24 ">
            <div class="p-6">
                <h2 class="text-2xl font-semibold text-gray-800 mb-4">Recent Employees</h2>
                <div class="space-y-4">
                    @foreach($recentEmployees as $employee)
                    <div class="bg-gray-50 rounded-lg p-4">
                        <h3 class="text-lg font-semibold text-gray-800">{{ $employee->name }}</h3>
                        <div class="mt-2 text-sm text-gray-600">
                            <p>Email: {{ $employee->email }}</p>
                            <p>Role: {{ ucfirst($employee->role) }}</p>
                            {{-- <p>Joined: {{ $employee->created_at->format('M d, Y') }}</p> --}}
                        </div>
                    </div>
                    @endforeach
                </div >
            </div>
        </div>
    </div>
    </main>
  </div>
  
</body>
</html>

  