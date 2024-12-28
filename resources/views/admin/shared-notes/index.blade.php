@extends('layouts.app')
@section('content')
<style>
    /* Switch Styles */
    .switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
    }

    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        transition: 0.4s;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        transition: 0.4s;
    }

    input:checked + .slider {
        background-color: #2196F3;
    }

    input:checked + .slider:before {
        transform: translateX(26px);
    }

    .slider.round {
        border-radius: 34px;
    }

    .slider.round:before {
        border-radius: 50%;
    }
</style>

<div class="container flex mb-3">
    <div class="w-full sm:w-full bg-gray-600 p-4 rounded-lg shadow-lg">
        <h1 class="text-white text-2xl font-semibold">Shared Notes</h1>
        <hr class="border-t-3 border-red-500 mt-2">
        <div class="my-5 text-right px-2">
            <div class="w-full text-white bg-gray-400 mt-4 ml-2 rounded-xl shadow-md">
                <table class="display table-auto w-full" id="sharable">
                    <thead>
                        <tr class="text-center">
                            <th class="border border-gray-600 p-2 bg-gray">SN</th>
                            <th class="border border-gray-600 p-2 bg-gray">Note Title</th>
                            <th class="border border-gray-600 p-2 bg-gray">User Name</th>
                            <th class="border border-gray-600 p-2 bg-gray">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sharenote as $item)
                            <tr class="text-center">
                                <th class="border border-gray-500 p-2">{{$loop->index+1}}</th>
                                <th class="border border-gray-500 p-2">{{$item->title}}</th>
                                <th class="border border-gray-500 p-2">{{$item->user->name ?? 'N/A'}}</th>
                                
                                <th class="border border-gray-500 p-2">
                                    <button 
                                        class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-700" 
                                        onclick="openModal('{{$item->id}}')">Share
                                    </button>
                                </th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div id="shareModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
    <div class="bg-gray-500 rounded-lg p-6 w-1/3">
        <h2 class="text-xl font-bold mb-4">Share Note</h2>
        <form action="{{ route('admin.sharednotes.share') }}" method="POST">
            @csrf
            <input type="hidden" id="note_id" name="note_id">
            <div class="mb-4">
                <label for="user_id" class="block text-gray-700 font-bold mb-2">User Name</label>
                <select id="user_id" name="user_id" class="w-full border rounded p-2">
                    <option value="">Select User</option>
                    @foreach ($user as $u)
                        <option value="{{ $u->id }}">{{ $u->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-bold mb-2">Email</label>
                <input type="email" id="email" name="email" class="w-full border rounded p-2" placeholder="Enter email">
            </div>
            <div class="mb-4">
                <label for="access_type" class="block text-gray-700 font-bold mb-2">Access Type</label>
                <select id="access_type" name="access_type" class="w-full border rounded p-2">
                    <option value="view">View</option>
                    <option value="edit">Edit</option>
                </select>
            </div>
            <div class="flex justify-end">
                <button type="button" onclick="closeModal()" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-700 mr-2">Cancel</button>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Share</button>
            </div>
        </form>
    </div>
</div>

<script>
    function openModal(noteId) {
        document.getElementById('note_id').value = noteId;
        document.getElementById('shareModal').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('shareModal').classList.add('hidden');
    }
</script>
@endsection
