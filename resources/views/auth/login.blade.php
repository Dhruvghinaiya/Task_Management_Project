{{-- 

<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
     <!-- Scripts -->
     @vite(['resources/css/app.css', 'resources/js/app.js'])
   
</head>
<body class=" h-full">
  
<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8 ">
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
         <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-gray-900">Sign in to your account</h2>
    </div>
  
    <div class=" sm:mx-auto sm:w-full sm:max-w-sm">
      <form class="space-y-6" action="{{route('login.logic')}}" method="POST">
        @csrf
        <div>
          <label for="email" class="block text-sm/6 font-medium text-gray-900">Email address</label>
          <div class="mt-2">
            <input type="email" name="email" id="email" autocomplete="email"  class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
            @error('email')
                <span style="color: red">{{$message}}</span>
            @enderror
          </div>
        </div>
  
        <div>
          <div class="flex items-center justify-between">
            <label for="password" class="block text-sm/6 font-medium text-gray-900">Password</label>

          </div>
          <div class="mt-2">
            <input type="password" name="password" id="password" autocomplete="current-password" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
          </div>
          
          @error('password')
              <span  style="color: red">{{$message}}</span>
          @enderror
        </div>
  
        <div>
          <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sign in</button>
        </div>
      </form>
  
     
    </div>
  </div>
   
</body>
</html> --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 h-screen flex justify-center items-center">

    <div class="w-full max-w-sm bg-white p-8 rounded-lg shadow-lg">
        <h2 class="text-2xl font-semibold text-center text-gray-800 mb-6">Login</h2>
        
        <!-- Login Form -->
        <form action="{{route('login.logic')}}" method="POST">
          @csrf
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                <input type="email" id="email" name="email" value="{{old('email')}}" placeholder="Enter your email"
                    class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                    @error('email')
                    <span  style="color: red">{{$message}}</span>
                @enderror
            </div>

            <div class="mb-6">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" id="password" value="{{old('password')}}" name="password" placeholder="Enter your password"
                    class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                    @error('password')
                    <span  style="color: red">{{$message}}</span>
                @enderror
            </div>

            <button type="submit" class="w-full py-2 px-4 bg-indigo-600 text-white font-semibold rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50">
                Login
            </button>

            <div class="mt-4 text-center text-sm">
                {{-- <a href="#" class="text-indigo-600 hover:text-indigo-800">Forgot password?</a> --}}
            </div>
        </form>
    </div>

</body>
</html>
