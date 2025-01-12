@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 mb-3">
    <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
        <h1 class="text-3xl font-bold text-white mb-6">Archived Notes</h1>
    
        <div class="bg-gray-600 p-4 rounded-lg shadow-md">
            <a href="{{route('admin.note.index')}}" class="hover:text-blue-300 text-white">Notes</a>
            <table class="w-full border-bordered" id="archivednotestable">
                <thead>
                    <tr class="text-center text-white">
                        <th class="border border-gray-600 p-4 bg-gray-800">SN</th>
                        <th class="border border-gray-600 p-4 bg-gray-800">User Name</th>
                        <th class="border border-gray-600 p-4 bg-gray-800">Title</th>
                        <th class="border border-gray-600 p-4 bg-gray-800">Content</th>
                        <th class="border border-gray-600 p-4 bg-gray-800">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($archivednotes as $note)
                    <tr class="text-gray-300 transition duration-300">
                        <td class="border border-gray-600 p-4">{{ $loop->iteration }}</td>
                        <td class="border border-gray-600 p-4">{{ $note->user->name }}</td>
                        <td class="border border-gray-600 p-4">{{ $note->title }}</td>
                        <td class="border border-gray-600 p-4">{{ $note->content }}</td>
                        <td class="border border-gray-600 p-4">
                            <a href="{{ route('admin.archives.toggleArchive', $note->id) }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-600 transition duration-200">Unarchive</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    let table = new DataTable('#archivednotestable');
</script>
@endsection
