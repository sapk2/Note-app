@extends('layouts.users')

@section('user-content')
<div class="text-white">
    <h1 class="mt-4 p-4 mr-3 text-2xl flex border border-blue-900 rounded-md hover:bg-dark-900 hover:shadow-md hover:border-blue-600 transition-all duration-300 ease-in-out">
        Dashboard
    </h1>
    <p>Welcome to your user panel! Here you can manage your notes, view shared notes, and access archived notes.</p>
</div>

<div class="container flex flex-wrap gap-4 mb-3">
    <div class="w-full sm:w-full p-4 rounded-lg shadow-lg">
        <h1 class="text-white text-2xl font-semibold">Notes</h1>
        <hr class="border-t-2 border-red-500 mt-2">

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mt-4">
            @forelse ($note as $item)
                <div class="bg-gray-800 text-white rounded-lg p-4 shadow-md hover:shadow-lg transition duration-300 ease-in-out">
                    <div class="flex justify-between items-center">
                        <h2 class="text-xl font-bold">{{ $item->title }}</h2>
                        @if ($item->is_pinned == 'pinned')
                            <span class="badge badge-info bg-blue-500 text-white px-2 py-1 rounded">Pinned</span>
                        @endif
                    </div>
                    <p class="mt-2 text-gray-300">By: {{ $item->user->name }}</p>
                    <p class="mt-4 text-gray-400">{{ $item->content }}</p>
                    <div class="mt-4 flex  items-center">
                        <a href="{{ route('users.noteedit', $item->id) }}" style="display:inline; color:rgb(7, 245, 7)" class="inline-block px-4 py-2  text-white font-medium text-sm rounded-lg shadow  focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                            <path d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32l8.4-8.4Z" />
                            <path d="M5.25 5.25a3 3 0 0 0-3 3v10.5a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3V13.5a.75.75 0 0 0-1.5 0v5.25a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5V8.25a1.5 1.5 0 0 1 1.5-1.5h5.25a.75.75 0 0 0 0-1.5H5.25Z" />
                          </svg>
                        </a>
                        <a href="{{ route('users.noteshow', $item->id) }}" style="display:inline; color:rgba(255, 255, 0, 0.884)  " class="inline-block px-4 py-2  text-white font-medium text-sm rounded-lg shadow  focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                            <path d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                            <path fill-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 0 1 0-1.113ZM17.25 12a5.25 5.25 0 1 1-10.5 0 5.25 5.25 0 0 1 10.5 0Z" clip-rule="evenodd" />
                          </svg>
                        </a>
                        <form action="{{ route('users.notesdelete', $item->id) }}" method="POST" style="display:inline; color:rgb(246, 5, 5);" onclick="return confirm('Are you sure to Delete?')">
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
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection
