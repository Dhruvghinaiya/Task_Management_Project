
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Management Project</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50">
    <div class="min-h-screen flex flex-col bg-gray-100">

        <!-- Header Section -->
        <header class="bg-gray-600 text-white p-4 shadow-md">
            <div class="container mx-auto flex justify-between items-center">
                <h1 class="text-2xl font-semibold">Task Management System</h1>
                
                <div>
                    <!-- Login Button (Visible if user is not authenticated) -->
                    @guest
                        <a href="{{ route('login') }}" class="bg-violet-500 hover:bg-violet-700 text-white font-semibold py-2 px-4 rounded-lg">Login</a>
                    @endguest
    
                    <!-- Dashboard & Logout Buttons (Visible if user is authenticated) -->
                    @auth
                        @if(Auth::user()->role==='admin')    
                        <a href="{{route('admin.dashboard')}}" class="bg-violet-500  hover:bg-violet-700 text-white font-semibold py-2 px-4 rounded-lg">
                            Dashboard
                        </a>
                        @elseif (Auth::user()->role==='employee')
                        <a href="{{route('employee.dashboard')}}" class="bg-violet-500 hover:bg-violet-700 text-white font-semibold py-2 px-4 rounded-lg">
                            Dashboard
                        </a>
                        @elseif(Auth::user()->role==='client')
                        <a href="{{route('client.dashboard')}}" class="bg-violet-500 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded-lg">
                            Dashboard
                        </a>
                        @endif
                        <a href="{{route('logout')}}" class="bg-red-500 hover:bg-red-700 text-white font-semibold py-2 ml-5 px-4 rounded-lg">
                            Logout
                        </a>
                        </form>
                    @endauth
                </div>
            </div>
        </header>
    
    
    <div class="container mx-auto px-6 py-12">
        <!-- Heading Section -->
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-800">Task Management Project</h1>
            <p class="text-lg text-gray-600 mt-2">Efficiently manage tasks and projects with our powerful tools.</p>
        </div>

        <!-- Cards Section -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Card 1: Project Overview -->
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">Project Overview</h3>
                    <p class="text-gray-600">Get a high-level view of your project's progress, milestones, and status updates.</p>
                </div>
                <div class="px-6 pb-6">
                    <a href="{{route('login')}}" class="text-indigo-600 hover:text-indigo-800 font-semibold">Learn More</a>
                </div>
            </div>

            <!-- Card 2: Task Management -->
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">Task Management</h3>
                    <p class="text-gray-600">Easily assign tasks, track deadlines, and monitor the progress of every task in the project.</p>
                </div>
                <div class="px-6 pb-6">
                    <a href="{{route('login')}}" class="text-indigo-600 hover:text-indigo-800 font-semibold">Learn More</a>
                </div>
            </div>

            <!-- Card 3: Team Collaboration -->
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">Team Collaboration</h3>
                    <p class="text-gray-600">Facilitate seamless communication and collaboration among team members in real-time.</p>
                </div>
                <div class="px-6 pb-6">
                    <a href="#" class="text-indigo-600 hover:text-indigo-800 font-semibold">Learn More</a>
                </div>
            </div>

            <!-- Card 4: Analytics & Reporting -->
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">Analytics & Reporting</h3>
                    <p class="text-gray-600">Generate detailed reports to track project performance, task completion, and overall success.</p>
                </div>
                <div class="px-6 pb-6">
                    <a href="{{route('login')}}" class="text-indigo-600 hover:text-indigo-800 font-semibold">Learn More</a>
                </div>
            </div>

            <!-- Card 5: Deadline Tracking -->
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">Deadline Tracking</h3>
                    <p class="text-gray-600">Never miss a deadline with integrated tracking and reminders for all your project tasks.</p>
                </div>
                <div class="px-6 pb-6">
                    <a href="#" class="text-indigo-600 hover:text-indigo-800 font-semibold">Learn More</a>
                </div>
            </div>

            <!-- Card 6: Project Templates -->
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">Project Templates</h3>
                    <p class="text-gray-600">Kickstart your projects with customizable templates for different industries and needs.</p>
                </div>
                <div class="px-6 pb-6">
                    <a href="{{route('login')}}" class="text-indigo-600 hover:text-indigo-800 font-semibold">Learn More</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

    </main>

    <!-- Footer Section -->
    <footer class="bg-gray-600 text-white p-4 mt-8">
        <div class="container mx-auto text-center">
            <p>&copy; 2024 Task Management System. All rights reserved.</p>
        </div>
    </footer>

</div>
{{-- @endsection --}}


</body>
</html>

    </body>
</html>
