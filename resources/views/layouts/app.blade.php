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

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        <nav class="bg-gray-800 text-white">
            <div class="container mx-auto flex justify-between items-center py-4 px-6">
              <!-- Logo -->
              <div class="text-lg font-bold">
                <a href="#" class="hover:text-blue-300"><img src="{{ asset('./assets/img/noteapp.png') }}" alt=""  width="16"  height="16"></a>
              </div>
        
              <!-- Links -->
              <ul class="flex space-x-6">
                <li>
                  <a href="#" class="hover:text-blue-300">Dashboard</a>
                </li>
                <li>
                  <a href="#" class="hover:text-blue-300">Notes</a>
                </li>
                <li>
                  <a href="#" class="hover:text-blue-300">Shared-Notes</a>
                </li>
                <li>
                  <a href="#" class="hover:text-blue-300">Users</a>
                </li>
              </ul>
        
              <!-- Button -->
              <div>
                <form action="{{route('logout')}}" method="POST"  class="px-4 py-2 hover:bg-red-500">
                    @csrf
                    <button type="submit" class="w-full text-left">Logout</button>
                </form>
              </div>
            </div>
          </nav>
           <!-- <div class="w-64 bg-gray-800 text-white h-screen p-4">
                <h2 class="p-2 border-l-4 border-blue-600 m-2 text-lg hover:bg-red-300 block">
                    Dashboard
                </h2>
                <ul>
                    <li class="mb-2">
                        <a href="" class="p-2 border-l-4 border-blue-600 m-2 text-lg hover:bg-gray-300 block">Notes</a>
                    </li>
                    <li class="mb-2">
                        <a href="" class="p-2 border-l-4 border-blue-600 m-2 text-lg hover:bg-gray-300 block">Notes-share</a>
                    </li>
                    <li class="mb-2">
                        <a href="" class="p-2 border-l-4 border-blue-600 m-2 text-lg hover:bg-gray-300 block">Users</a>
                    </li>
                    

                </ul>
            </div>-->
            <!-- Page Content -->
            <main>
               @yield('content')
            </main>
        </div>
    </body>
</html>
