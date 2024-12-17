@extends('layouts.app')
@section('content')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold text-white mb-2">Admin Dashboard</h1>
    <hr class="border-t border-gray-200 mb-4">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
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
                <h2 class="text-xl font-semibold text-white">TotalUsers</h2>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.25M13.5 7a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
            </div>
            <div class="text-3xl font-bold text-white">{{ $totalusers }}</div>
        </div>
        <div class="flex flex-col bg-blue-400 shadow-md rounded-lg p-6 border border-blue-400">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-semibold text-white">Shared Notes</h2>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z" />
                </svg>    
            </div>
            <div class="text-2xl font-bold text-white">{{$totalshare}}</div>
        </div>
    </div>
     <!-- Pie Chart Card -->
     <div class="flex flex-col shadow-md rounded-lg p-2  mt-4">
        <h2 class="text-xl font-semibold text-gray-700 mb-4">Overview</h2>
        <div class="relative w-md max-w-md mx-auto">
            <canvas id="overviewChart"></canvas>
        </div>
    </div>
    
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const ctx = document.getElementById('overviewChart').getContext('2d');
            new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: ['Total Notes', 'Total Users', 'Total Shares'],
                    datasets: [{
                        data: [{{ $totalnotes }}, {{ $totalusers }}, {{ $totalshare }}],
                        backgroundColor: ['#4CAF50', '#2196F3', '#FF9800'],
                        hoverBackgroundColor: ['#45A049', '#1E88E5', '#FB8C00']
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                    },
                }
            });
        });
    </script>
    
    <style>
        #overviewChart {
            height: 250px;
        }
    </style>
    

@endsection
