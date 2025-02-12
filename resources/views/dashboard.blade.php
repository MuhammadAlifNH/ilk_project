<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Inventaris Lab Komputer</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Jika menggunakan Alpine.js untuk sidebar toggle -->
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>
<body class="bg-gray-100">
    <div x-data="{ open: true }" class="flex h-screen">
        <!-- Sidebar -->  
        <div :class="open ? 'w-64' : 'w-20'" class="bg-white dark:bg-gray-800 border-r border-gray-200 dark:border-gray-700 transition-all duration-300 flex flex-col">
            <!-- Logo dan toggle button -->  
            <div class="flex items-center justify-between p-4 border-b border-gray-200 dark:border-gray-700">
                <div class="flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-8 w-auto fill-current text-gray-800 dark:text-gray-200" />
                    </a>
                    <span x-show="open" class="ml-2 font-bold text-gray-800 dark:text-gray-200">Inventaris Laboratorium</span>
                </div>
                <button @click="open = !open" class="focus:outline-none text-gray-800 dark:text-gray-200">
                    <svg x-show="open" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                    <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
            
            <!-- Navigation Links -->  
            <nav class="mt-4 flex-1 overflow-y-auto">
                <a href="{{ route('dashboard') }}" class="flex items-center p-4 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"  xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M13 5v6h6" />
                    </svg>
                    <span x-show="open" class="ml-4">Dashboard</span>
                </a>
                <!-- Tambahkan link lainnya sesuai kebutuhan -->  
            </nav>
            
            <!-- User Dropdown (opsional) -->  
            <div class="p-4 border-t border-gray-200 dark:border-gray-700" x-show="open">
                <div class="flex items-center space-x-3">
                    <img src="https://via.placeholder.com/150" alt="User Avatar" class="h-10 w-10 rounded-full">
                    <div class="text-gray-800 dark:text-gray-200 text-sm font-medium">
                        {{ Auth::user()->name ?? 'User Name' }}<br>
                        <span class="text-gray-500 dark:text-gray-400 text-xs">{{ Auth::user()->email ?? 'user@example.com' }}</span>
                    </div>
                </div>
                <div class="mt-3 space-y-1">
                    <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">Profile</a>
                    <form method="POST" action="{{ route('logout') }}" class="mt-1">
                        @csrf
                        <a href="{{ route('logout') }}" class="block px-4 py-2 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700" onclick="event.preventDefault(); this.closest('form').submit();">Log Out</a>
                    </form>
                </div>
            </div>
        </div>
        
        <!-- Main Content Area -->  
        <div class="flex-1 p-8">
            @yield('content')
        </div>
    </div>
</body>
</html>
