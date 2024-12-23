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
    <x-employee-header/>
    
    <header class="bg-white shadow">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 flex">
            <h1 class="text-3xl font-bold tracking-tight text-gray-900">Task</h1>
           
          </div>
    </header>
    <main>
      <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <form action="{{route('employee.task.store')}}" method="POST" class="max-w-4xl mx-auto p-6 bg-white shadow-md border rounded-lg space-y-6">
          @csrf
          <div class="space-y-2">
            <label for="task_name" class="block text-sm font-medium text-gray-700">Task Name</label>
            <input type="text" id="task_name" name="name" required class="w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
          </div>
        
          <div class="space-y-2">
            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea id="description" name="description" required class="w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"></textarea>
          </div>
        
          <div class="space-y-2">
            <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
            <select id="status" name="status" class="w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
              <option value="pending">Pending</option>
              <option value="in_progress">In Progress</option>
              <option value="completed">Completed</option>
            </select>
          </div>
           

          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label for="project_id" class="block text-sm font-medium text-gray-700">Project</label>
                <select 
                    name="project_id" 
                    id="project_id" 
                    class="w-full m-1 p-2 border rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 cursor-pointer">
                    <option value="">Select a project</option>
                    @foreach($projects as $project)
                        <option value="{{ $project->id }}">{{ $project->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="assigned_to" class="block text-sm font-medium text-gray-700">Assigned To</label>
                <select 
                    name="assigned_to" 
                    id="assigned_to" 
                    class="w-full mt-1 p-2 border rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 cursor-pointer">
                    <option value="">Unassigned</option>
                    @foreach($employees as $employee)
                        <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                    @endforeach
                </select>
            </div>
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

  