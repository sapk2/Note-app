@extends('layouts.users')

@section('user-content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<div class="text-white">
    <h1 class="mt-4 p-4 mr-3 text-2xl flex border border-blue-900 rounded-md hover:bg-dark-900 hover:shadow-md hover:border-blue-600 transition-all duration-300 ease-in-out">
        Dashboard
    </h1>
    <p>Welcome {{ Auth::user()->name }}! Here you can manage your notes, view shared notes, and access archived notes.</p>
</div>

<!-- overview statistic -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-4">
    <div class="bg-red-500 shadow-md rounded-lg p-6 border border-red-500 flex flex-col">
        <div class="flex justify-between item-center mb-4">
            <h2 class="text-xl font-semibold text-white">Total Notes</h2>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
            </svg>
        </div>
        <div class="text-3xl font-bold text-white">{{$totalnotes}}</div>
    </div>
    <div class="bg-green-500 shadow-md rounded-lg p-6 border border-green-500 flex flex-col">
        <div class="flex justify-between items-center mb-2">
            <h2 class="text-xl font-semibold text-white">Total Archive</h2>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5m8.25 3v6.75m0 0-3-3m3 3 3-3M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
              </svg>
        </div>
        <div class="text-3xl font-bold text-white">{{ $totalarchived }}</div>
    </div>
    <div class="bg-blue-500 shadow-md rounded-lg p-6 border border-blue-500 flex flex-col">
        <div class="flex justify-between items-center mb-2">
            <h2 class="text-xl font-semibold text-white">Total Shared</h2>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M7.217 10.907a2.25 2.25 0 1 0 0 2.186m0-2.186c.18.324.283.696.283 1.093s-.103.77-.283 1.093m0-2.186 9.566-5.314m-9.566 7.5 9.566 5.314m0 0a2.25 2.25 0 1 0 3.935 2.186 2.25 2.25 0 0 0-3.935-2.186Zm0-12.814a2.25 2.25 0 1 0 3.933-2.185 2.25 2.25 0 0 0-3.933 2.185Z" />
              </svg>
              
        </div>
        <div class="text-3xl font-bold text-white">{{ $totalshare }}</div>
    </div>

</div>

  
<div class="container flex flex-wrap gap-4 mb-2">
    <div class="w-full sm:w-full p-4 rounded-lg shadow-lg mt-4 bg-gradient-to-r from-blue-900 via-gray-800 to-blue-900" id="overviewContainer">
        <div class="flex justify-between items-center">
            <h1 class="text-white text-2xl font-semibold">Overviews</h1>
            <!-- Toggle Icon -->
            <i id="toggleOverviewIcon" class="fas fa-minus text-white cursor-pointer text-xl"></i>
        </div>
        <hr class="border-t-2 border-red-500 mt-2">
        
        <!-- Flex row for side-by-side charts -->
        <div class="flex flex-row justify-around mt-4" id="overviewContent">
            <!-- Pie Chart Container -->
            <div class="relative w-1/2 max-w-md mx-auto" style="height: 250px;">
                <canvas id="overviewPieChart"></canvas>
            </div>
            
            <!-- Line Chart Container -->
            <div class="relative w-1/2 max-w-md mx-auto" style="height: 250px;">
                <canvas id="overviewLineChart"></canvas>
            </div>
        </div>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const overviewContent = document.getElementById('overviewContent');
                const toggleIcon = document.getElementById('toggleOverviewIcon');

                // Toggle functionality using the icon
                toggleIcon.addEventListener('click', function() {
                    if (overviewContent.style.display === 'none') {
                        overviewContent.style.display = 'flex';
                        toggleIcon.classList.remove('fa-plus');
                        toggleIcon.classList.add('fa-minus');
                    } else {
                        overviewContent.style.display = 'none';
                        toggleIcon.classList.remove('fa-minus');
                        toggleIcon.classList.add('fa-plus');
                    }
                });

                // Pie Chart
                const pieCtx = document.getElementById('overviewPieChart').getContext('2d');
                const pieData = @json([$totalnotes, $totalarchived, $totalshare]);
                new Chart(pieCtx, {
                    type: 'pie',
                    data: {
                        labels: ['Total Notes', 'Total Archive', 'Total Shares'],
                        datasets: [{
                            data: pieData,
                            backgroundColor: ['#d857f2', '#39f720', '#20e1f7'],
                            hoverBackgroundColor: ['#e83c40', '#1E88E5', '#20e1f7']
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                position: 'top',
                                labels: {
                                    color: '#FFFFFF',
                                }
                            },
                        },
                    }
                });

                // Line Chart
                const lineCtx = document.getElementById('overviewLineChart').getContext('2d');
                const lineData = {
                    labels: ['Total Notes', 'Total Archive','Total pinned'],
                    datasets: [{
                        label: 'Total Activity',
                        data: @json([$totalnotes, $totalarchived,  $totalispinned]), // Replace with actual data
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 2,
                        tension: 0.4,
                    }]
                };
                new Chart(lineCtx, {
                    type: 'line',
                    data: lineData,
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                position: 'top',
                            },
                        },
                        scales: {
                            x: {
                                title: {
                                    display: true,
                                    text: 'Notes',
                                    color: '#FFFFFF',
                                },
                                ticks: {
                                    color: '#FFFFFF'
                                }
                            },
                            y: {
                                title: {
                                    display: true,
                                    text: 'Count',
                                    color: '#FFFFFF',
                                },
                                ticks: {
                                    color: '#FFFFFF'
                                },
                            },
                        },
                    }
                });
            });
        </script>
    </div>
</div>





<div class="container flex flex-wrap gap-4 mb-3">
    <div class="w-full sm:w-full p-4 rounded-lg shadow-lg">
        <div class="flex justify-between item-center">
            <h1 class="text-white text-2xl font-semibold">Notes</h1>
            <div id="toggle-icon" class=" ml-12 text-blue-500 cursor-pointer hover:text-blue-300 transition flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                    <path fill-rule="evenodd" d="M12.53 16.28a.75.75 0 0 1-1.06 0l-7.5-7.5a.75.75 0 0 1 1.06-1.06L12 14.69l6.97-6.97a.75.75 0 1 1 1.06 1.06l-7.5 7.5Z" clip-rule="evenodd" />
                  </svg>
                  
            </div>
        </div>

        <hr class="border-t-2 border-red-500 mt-2">
        <div id="notes-content" class=" mt-4">
            @if ($note->count() > 10)
            <form action="{{ route('users.dashboard') }}" method="GET" class="mb-4">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search notes..." class="w-30 p-2 rounded border-gray-800 focus:border-blue-500 focus:ring focus:ring-blue-200">
                <button type="submit" class="mt-2 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition"> Search </button>
            </form>
                
            @endif

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mt-4">
                @forelse ($note as $item)
                    <div class="bg-gray-800 text-white rounded-lg p-4 shadow-md hover:shadow-lg transition duration-300 ease-in-out">
                        <div class="flex justify-between items-center">
                            <h2 class="text-xl font-bold">{{ $item->title }}</h2>
                            @if ($item->is_pinned == 'pinned')
                                <span class="badge badge-info bg-gray-800 text-white px-2 py-1 rounded"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                    <path fill-rule="evenodd" d="M16.098 2.598a3.75 3.75 0 1 1 3.622 6.275l-1.72.46V12a.75.75 0 0 1-.22.53l-.75.75a.75.75 0 0 1-1.06 0l-.97-.97-7.94 7.94a2.56 2.56 0 0 1-1.81.75 1.06 1.06 0 0 0-.75.31l-.97.97a.75.75 0 0 1-1.06 0l-.75-.75a.75.75 0 0 1 0-1.06l.97-.97a1.06 1.06 0 0 0 .31-.75c0-.68.27-1.33.75-1.81L11.69 9l-.97-.97a.75.75 0 0 1 0-1.06l.75-.75A.75.75 0 0 1 12 6h2.666l.461-1.72c.165-.617.49-1.2.971-1.682Zm-3.348 7.463L4.81 18a1.06 1.06 0 0 0-.31.75c0 .318-.06.63-.172.922a2.56 2.56 0 0 1 .922-.172c.281 0 .551-.112.75-.31l7.94-7.94-1.19-1.19Z" clip-rule="evenodd" />
                                </svg>
                                </span>
                            @endif
                        </div>
                        <p class="mt-2 text-gray-300">By: {{ $item->user->name }}</p>
                        <p class="mt-4 text-gray-400">{{ $item->content }}</p>
                        <p class="mt-4 text-gray-400">{{ $item->created_at }}</p>
                        <div class="mt-4 flex  items-center">
                            <a href="{{ route('users.noteedit', $item->id) }}" style="display:inline; color:rgb(73, 75, 73) " class="inline-block px-4 py-2  text-white font-medium text-sm rounded-lg shadow  focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                <path d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32l8.4-8.4Z" />
                                <path d="M5.25 5.25a3 3 0 0 0-3 3v10.5a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3V13.5a.75.75 0 0 0-1.5 0v5.25a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5V8.25a1.5 1.5 0 0 1 1.5-1.5h5.25a.75.75 0 0 0 0-1.5H5.25Z" />
                            </svg>
                            </a>
                            <a href="{{ route('users.noteshow', $item->id) }}" style="display:inline; color:rgba(119, 119, 116, 0.884)  " class="inline-block px-4 py-2  text-white font-medium text-sm rounded-lg shadow  focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                <path d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                <path fill-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 0 1 0-1.113ZM17.25 12a5.25 5.25 0 1 1-10.5 0 5.25 5.25 0 0 1 10.5 0Z" clip-rule="evenodd" />
                            </svg>
                            </a>
                            <form action="{{ route('users.notesdelete', $item->id) }}" method="POST" style="display:inline; color:rgb(210, 87, 87);" onclick="return confirm('Are you sure to Delete?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="inline-block px-4 py-2 font-medium text-sm rounded-lg shadow  focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                    <path fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z" clip-rule="evenodd" />
                                    </svg></button>
                            </form>
                        
                        
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center text-red-500">
                        <p>No notes available.</p>
                        <a href="{{ route('users.mynotes') }}" class="mt-4 inline-block px-6 py-3 text-lg font-semibold text-white bg-blue-600 rounded-lg hover:bg-blue-700 transition">
                        Create a New Note
                    </a>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>

<script>
    const toggleIcon =document.getElementById('toggle-icon');
    const notescontent = document.getElementById('notes-content');
    const toggletext = document.getElementById('toggle-text');   
    
    toggleIcon.addEventListener('click', () => {
        if (notescontent.style.display === 'none') {
            notescontent.style.display = 'block';
        } else {
            notescontent.style.display = 'none';
        }
    });
</script>

@endsection
