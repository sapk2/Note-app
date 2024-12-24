@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 mb-3">
    <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
        <h1 class="text-3xl font-bold text-white mb-6">Archived Notes</h1>
    
        <div class="bg-gray-700 p-4 rounded-lg shadow-md">
            <a href="{{route('admin.note.index')}}" class="hover:text-blue-300 text-white">Notes</a>
            <table class="w-full border-collapse">
                <thead>
                    <tr class="text-left text-white bg-gray-900">
                        <th class="border border-gray-700 p-4">SN</th>
                        <th class="border border-gray-700 p-4">User Name</th>
                        <th class="border border-gray-700 p-4">Title</th>
                        <th class="border border-gray-700 p-4">Content</th>
                        <th class="border border-gray-700 p-4">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($archivednotes as $note)
                    <tr class="text-gray-300 hover:bg-gray-800 transition duration-300">
                        <td class="border border-gray-700 p-4">{{ $loop->iteration }}</td>
                        <td class="border border-gray-700 p-4">{{ $note->user->name }}</td>
                        <td class="border border-gray-700 p-4">{{ $note->title }}</td>
                        <td class="border border-gray-700 p-4">{{ $note->content }}</td>
                        <td class="border border-gray-700 p-4">
                            <a href="{{ route('admin.archives.toggleArchive', $note->id) }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-500 transition duration-200">Unarchive</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
