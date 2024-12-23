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
        <h1 class="text-3xl font-bold tracking-tight text-gray-900">All Client</h1>
        <div class="flex gap-5 ml-auto">
         
        </div>
      </div>
    </header>
    <main>
      <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        @if (session('success'))
        <x-AlertSuccess :message="session('success')" />
        @endif
      @if (session('error'))
        <x-AlertSuccess :message="session('error')" />
      @endif
      </div>
      <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        
        <div class="container mx-auto mt-10">
  
    <div class="container mx-auto mt-10">

  
        <div class="overflow-x-auto bg-white rounded-lg shadow-lg">
            <table class="min-w-full table-auto">
                <thead class="bg-gray-200 text-gray-600">
                    <tr>
                        <th class="px-4 py-2 text-left">Name</th>
                        <th class="px-4 py-2 text-left">Email</th>
                        <th class="px-4 py-2 text-left">Company Name</th>
                        <th class="px-4 py-2 text-left">Company Mobile</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @foreach ($clients as $client)
                        <tr class="border-t hover:bg-gray-100">
                            <td class="px-4 py-3">{{$client->name}}</td>
                            <td class="px-4 py-3">{{$client->email}}</td>
                            <td class="px-4 py-3">{{$client->clientDetail->company_name ?? 'N/A'}}</td>
                            <td class="px-4 py-3">{{$client->ClientDetail->contact_number ?? 'N/A'}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-6">
            <a href="{{ route('admin.client.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition duration-200">
              Back to Projects
            </a>
          </div>
        
    </div>

</body>

</html>

      </div>
      </div>
    </main>
  </div>
  
</body>
</html>

  