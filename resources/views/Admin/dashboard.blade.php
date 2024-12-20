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
    <a href="/tasks" class="card bg-white min-h-[150px] p-6 rounded-lg border hover:shadow-xl transition-all duration-300 transform hover:scale-105">
      <h2 class="text-xl font-semibold text-gray-700">Total Tasks</h2>
      <p class="text-3xl font-bold text-blue-500">120</p>
      <p class="text-gray-500">View All Tasks</p>
    </a>

    <!-- Project Card -->
    <a href="/projects" class="card bg-white p-6 rounded-lg border hover:shadow-xl transition-all duration-300 transform hover:scale-105">
      <h2 class="text-xl font-semibold text-gray-700">Total Projects</h2>
      <p class="text-3xl font-bold text-green-500">50</p>
      <p class="text-gray-500">View All Projects</p>
    </a>

    <!-- Client Card -->
    <a href="/clients" class="card bg-white p-6 rounded-lg border hover:shadow-xl transition-all duration-300 transform hover:scale-105">
      <h2 class="text-xl font-semibold text-gray-700">Total Clients</h2>
      <p class="text-3xl font-bold text-purple-500">30</p>
      <p class="text-gray-500">View All Clients</p>
    </a>
  
  </div>
</div>

      </div>
    </main>
  </div>
  
</body>
</html>

  