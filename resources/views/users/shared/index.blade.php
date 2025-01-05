@extends('layouts.users')

@section('user-content')
<div class="container flex flex-wrap mb-3">
    <div class="w-full sm:w-full bg-gray p-4 rounded-lg shadow-lg">
        <h1 class="text-white text-2xl font-bold">Shared Notes</h1>
        <hr class="border-t-3 border-red-500 mt-2">
        <div class="w-full text-white bg-gray-900 mt-4 p-4 rounded-xl shadow-md grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            @foreach($sharenote as $sharedNote)
            <div class="bg-gray-700 rounded-lg p-4 shadow-md">
                <h2 class="text-xl font-bold text-white mb-2">{{ $sharedNote->title }}</h2>
                <p class="text-gray-300">Shared by: <span class="font-semibold">{{ $sharedNote->user->name }}</span></p>
                <div class=" mt-4">
                    <button class="bg-gray-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" onclick="openModal('{{ $sharedNote->id }}')"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                        <path fill-rule="evenodd" d="M15.75 4.5a3 3 0 1 1 .825 2.066l-8.421 4.679a3.002 3.002 0 0 1 0 1.51l8.421 4.679a3 3 0 1 1-.729 1.31l-8.421-4.678a3 3 0 1 1 0-4.132l8.421-4.679a3 3 0 0 1-.096-.755Z" clip-rule="evenodd" />
                      </svg> </button>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Modal -->
<div id="modal" style="display: none;"  class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center transition-all">
    <div class="modal-content bg-gray-700 p-6 rounded-lg shadow-lg relative w-1/3">
        <button  class="absolute top-2 right-2 text-white text-xl font-bold" onclick="closeModal()"> &times; </button>
        <h1 class="text-center text-2xl font-bold text-white mb-4">Share Note</h1>
        <form action="{{ route('users.shared.share') }}" method="POST" id="shareForm">
            @csrf
            <input type="hidden" name="note_id" id="note_id">
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
                <label for="email" class="block text-white mb-2">Recipient Email</label>
                <input type="email" name="email"  id="email" class="w-full bg-gray-400 p-2 rounded-lg text-black"  required>
                <p id="emailError" class="text-red-500 text-sm mt-1 hidden">Please enter a valid email address.</p>
            </div>
            <div class="mb-4">
                <label for="access_type" class="block text-gray-700 font-bold mb-2">Access Type</label>
                <select id="access_type" name="access_type" class="w-full border rounded p-2">
                    <option value="view">View</option>
                    <option value="edit">Edit</option>
                </select>
            </div>
            <div class="text-center">
                <button type="submit"  class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"> Share </button>
            </div>
        </form>
    </div>
</div>

<script>
    function openModal(id) {
        document.getElementById('note_id').value = id;
        document.getElementById('modal').style.display = 'flex';
    }

    function closeModal() {
        document.getElementById('modal').style.display = 'none';
    }
</script>
@endsection
