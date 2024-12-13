@extends('layouts.app')
@section('content')

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
                <h2 class="text-xl font-semibold text-white">totalUsers</h2>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.25M13.5 7a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
            </div>
            <div class="text-3xl font-bold text-white">{{ $totalusers }}</div>
        </div>
        
    </div>
</div>
    
@endsection
