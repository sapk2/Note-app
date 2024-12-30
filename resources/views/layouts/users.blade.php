<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
  
<!-- DataTable CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

<!-- jQuery CDN -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- DataTable JS -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>


    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        <!-- Navigation -->
        <nav class="bg-gray-800 text-white  hover:shadow-md hover:border-blue-600 transition-all duration-300 ease-in-out">
            <div class="container mx-auto flex justify-between items-center py-4 px-6">
                <!-- Logo -->
                <div class="flex items-center space-x-2 text-lg font-bold">
                    <img src="{{ asset('./assets/img/noteapp.png') }}" alt="NoteApp Logo"  width="32"  height="32"  class="inline-block"  >
                    <a href="#" class="hover:text-blue-300">NoteApp</a>
                </div>

                <!-- Navigation Links (Desktop) -->
                <ul class="hidden md:flex items-center space-x-6">
                    <li class="nav-item"><a href="{{route('users.dashboard')}}" class="hover:text-blue-300">Dashboard</a></li>
                    <li class="nav-item"><a href="{{route('users.mynotes')}}" class="hover:text-blue-300">My Notes</a></li>
                    <li class="nav-item"><a href="{{route('users.archives.index')}}" class="hover:text-blue-300">Archive</a></li>
                    <li class="nav-item"><a href="{{route('users.shared.index')}}" class="hover:text-blue-300">Share</a></li>    
                  <li>
                      <form action="{{ route('logout') }}" method="POST" class="inline">
                          @csrf
                          <button 
                              type="submit" 
                              class="px-4 py-2 hover:bg-red-500"
                          >
                              Logout
                          </button>
                      </form>
                  </li>
              </ul>
              

                <!-- Hamburger Menu (Mobile) -->
                <button   id="menu-toggle" class="md:hidden text-white focus:outline-none" aria-label="Toggle menu" >
                    <svg  class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none"  viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"  d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>

            <!-- Mobile Menu -->
            <div 
                id="mobile-menu" 
                class="hidden md:hidden space-y-4 py-4 px-6 bg-gray-700"
            >
                <ul>
                    <li class="nav-item"><a href="{{route('users.dashboard')}}" class="hover:text-blue-300">Dashboard</a></li>
                    <li class="nav-item"><a href="{{route('users.mynotes')}}" class="hover:text-blue-300">My Notes</a></li>
                    <li class="nav-item"><a href="{{route('users.archives.index')}}" class="hover:text-blue-300">Archive</a></li>
                    <li class="nav-item"><a href="{{route('users.shared.index')}}" class="hover:text-blue-300">Share-Note</a></li>
    
                </ul>
                <!-- Logout Button -->
                <form action="{{ route('logout') }}" method="POST" class="block">
                    @csrf
                    <button type="submit"  class="w-full px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded transition">
                        Logout
                    </button>
                </form>
            </div>
        </nav>

        <!-- Page Content -->
        <main class="container mx-auto py-8 px-6">
            @yield('user-content')
        </main>
    </div>

    <!-- Toggle Script -->
    <script>
        const menuToggle = document.getElementById('menu-toggle');
        const mobileMenu = document.getElementById('mobile-menu');

        menuToggle.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    </script>
</body>
</html>
