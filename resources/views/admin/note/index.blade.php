@extends('layouts.app')

@section('content')
    <div class="container flex mb-3">
        <div class="w-full sm:w-full bg-gray-600 p-4 rounded-lg shadow-lg">
            <h1 class="text-white text-2xl font-semibold">Notes</h1>
            <hr class="border-t-2 border-red-500 mt-2">
            
            <div class="my-5 text-right px-2">
                <a href="{{ route('admin.note.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition duration-600">Add Note</a>
            </div>
            
            <div class="w-full text-white bg-gray-400 mt-4 ml-2 rounded-xl shadow-md">
                <table class="display table table-bordered w-full" id="notestable">
                    <thead>
                        <tr class="text-center">
                            <th class="border border-gray-600 p-2 bg-gray-800">SN</th>
                            <th class="border border-gray-600 p-2 bg-gray-800">User Name</th>
                            <th class="border border-gray-600 p-2 bg-gray-800">Title</th>
                            <th class="border border-gray-600 p-2 bg-gray-800">Content</th>
                            <th class="border border-gray-600 p-2 bg-gray-800">Action</th>
                        </tr>
                    </thead>  
                    <tbody>
                        @foreach ($notes as $item)
                        <tr class="text-center @if($item->is_pinned == 'pinned') bg-red-100 @endif">
                            <td class="border border-gray-600 p-2">{{ $loop->iteration }}</td>
                            <td class="border border-gray-600 p-2">{{ $item->user->name }}</td>
                            <td class="border border-gray-600 p-2">{{ $item->title }}</td>
                            <td class="border border-gray-600 p-2">{{ $item->content }}</td>
                            <td class="border border-gray-600 p-2">
                                <a href="{{ route('admin.note.edit', $item->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600 transition duration-600">Edit</a>
                                <form action="{{ route('admin.note.delete', $item->id) }}" method="POST" style="display:inline;" onclick="return confirm('Are you sure to Delete?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 transition duration-600" >Delete</button>
                                </form>
                                <!-- Display Pinned Badge -->
                                @if($item->is_pinned == 'pinned')
                                    <span class="badge badge-info bg-blue-500 text-white px-2 py-1 rounded">Pinned</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        let table = new DataTable('#notestable');
    </script>
@endsection