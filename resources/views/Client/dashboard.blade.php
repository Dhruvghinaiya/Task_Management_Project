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
      <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold tracking-tight text-gray-900">Dashboard</h1>
      </div>
    </header>
    <main>
      <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <!-- Your content -->
      </div>
    </main>
  </div>
  
</body>
</html>

<script>
    const dropdownButton = document.getElementById('dropdownButton');
    const dropdownMenu = document.getElementById('dropdownMenu');
  
    dropdownButton.addEventListener('click', () => {
      if (dropdownMenu.classList.contains('hidden')) {
        dropdownMenu.classList.remove('hidden', 'opacity-0', 'scale-95');
        dropdownMenu.classList.add('opacity-100', 'scale-100');
      } else {
        dropdownMenu.classList.add('opacity-0', 'scale-95');
        dropdownMenu.classList.remove('opacity-100', 'scale-100');
        setTimeout(() => dropdownMenu.classList.add('hidden'), 75); // Match the transition duration
      }
    });
  </script>
  