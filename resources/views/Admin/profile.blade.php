

   {{-- <!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @Vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="h-full">
    <div class="min-h-full">
        <x-admin-header/>

        <header class="bg-white shadow">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <h1 class="text-3xl font-bold tracking-tight text-gray-900">Profile</h1>
            </div>
        </header>
        <main>
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

                @if (session('message'))
                @php 
                    $message = session('message');
                @endphp
                <div id="alert-message" class="alert-container">
                    @if($message['status'] == 'success')
                        <x-AlertSuccess :message="$message['description']" />
                    @elseif($message['status'] == 'error')
                        <x-AlertError :message="$message['description']" />
                    @endif
                </div>
            @endif --}}

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
    
<div class="min-h-full">
    <x-admin-header/>

    <header class="bg-white shadow">
      <div class="mx-auto max-w-7xl px-4  sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold tracking-tight text-gray-900">Profile</h1>
      </div>
    </header>
    <main>
      <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="mb-4">

          @if (session('success'))
          <x-AlertSuccess :message="session('success')" />
          @endif
          @if (session('error'))
          <x-AlertError :message="session('error')" />
          @endif
        </div>
                <div class="isolate bg-white px-6 sm:py-32 lg:px-8">
                    <div class="absolute inset-x-0 top-[-10rem] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[-20rem]" aria-hidden="true"></div>
                    <form action="{{route('admin.profile.update')}}" method="POST" class="mx-auto max-w-xl">
                        @csrf
                        @method('Patch')
                        <div class="grid grid-cols-1 gap-x-8 gap-y-2 sm:grid-cols-2">
                            <!-- Profile Image Section -->
                            <div class="col-span-2 text-center">
                                <h2 class="text-xl font-semibold text-gray-900">Profile Image</h2>
                                <div class="mt-4">
                                    <img src="https://www.w3schools.com/w3images/avatar2.png" alt="Profile Image" class="w-32 h-32 rounded-full mx-auto">
                                </div>
                            </div>
                            <!-- Name Input -->
                            <div>
                                <label for="name" class="block text-sm/6 font-semibold text-gray-900">Name</label>
                                <div class="mt-2.5">
                                    <input type="text" name="name" value="{{Auth::user()->name}}" id="name" autocomplete="given-name" class="block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600">
                                </div>
                            </div>
                            <!-- Role Input (Disabled) -->
                            <div>
                                <label for="last-name" class="block text-sm/6 font-semibold text-gray-900">Role</label>
                                <div class="mt-2.5">
                                    <input type="text" disabled name="role" id="role" value="{{Auth::user()->role}}" autocomplete="family-name" class="block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600">
                                </div>
                            </div>
                            <!-- Email Input -->
                            <div class="sm:col-span-2">
                                <label for="email" class="block text-sm/6 font-semibold text-gray-900">Email</label>
                                <div class="mt-2.5">
                                    <input type="email" name="email" id="email" autocomplete="email" value="{{Auth::user()->email}}" class="block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600">
                                </div>
                            </div>
                        </div>
                        <!-- Submit Button -->
                        <div class="mt-10">
                            <input type="submit" value="Edit" class="block w-full rounded-md bg-indigo-600 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600"/>
                        </div>
                        <!-- Back Button -->
                        <div class="mt-10">
                            <a href="{{route('admin.dashboard')}}" class="block w-full rounded-md bg-gray-600 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-gray-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
