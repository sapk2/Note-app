@extends('layouts.users')
@section('user-content')
<link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
<div class="container flex justify-center mb-3">
    <div class="max-w-md w-full bg-gray-600 p-4 rounded-lg shadow-lg">
        <h1 class="text-white text-2xl font-semibold">Create Note</h1>
        <hr class="border-t-2 border-red-500 mt-2">

        <form action="{{ route('users.mystore') }}" method="POST" enctype="multipart/form-data" onsubmit="return setQuillContent()">
            @csrf
            <div class="relative z-0 w-full mb-5 group">
                <input type="text" name="title" id="title" class="block py-4 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                <label for="title" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Title</label>
            </div>

            <label for="content" class="block w-full py-2 px-3 text-white">Content</label>
            <div id="editor" class="text-white mb-4">
                <!-- Quill editor goes here -->
            </div>

            <!-- Hidden textarea to submit the content from Quill editor -->
            <input type="hidden" name="content" id="content" required />

            @error('content')
                <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror

            <!-- Optional Fields -->
            <div class="mb-4">
                <label for="is_shared" class="flex items-center text-gray-500 dark:text-gray-400">
                    <input type="checkbox" name="is_shared" id="is_shared" value="1" class="mr-2"> Shared
                </label>
                @error('is_shared')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="is_archived" class="flex items-center text-gray-500 dark:text-gray-400">
                    <input type="checkbox" name="is_archived" id="is_archived" value="1" class="mr-2"> Archived
                </label>
                @error('is_archived')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="is_pinned" class="flex items-center text-gray-500 dark:text-gray-400">
                    <input type="checkbox" name="is_pinned" id="is_pinned" value="1" class="mr-2"> Pinned
                </label>
                @error('is_pinned')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <div class="flex justify-center mt-4 flex-wrap">                 
                <input type="submit" class="bg-blue-600 text-white px-4 mx-2 py-2 rounded hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:hover:bg-blue-700 dark:focus:ring-blue-800 ">                 
                <a href="{{ route('users.dashboard') }}" class="bg-red-600 text-white px-10 mx-2 py-2 rounded">Exit</a>
            </div>         
        </form>
        
    </div>
</div>

<script>
    // Initialize Quill editor
    const quill = new Quill('#editor', {
        theme: 'snow'
    });

    // Function to copy content from Quill to the hidden input before form submission
    function setQuillContent() {
        const contentInput = document.querySelector('input[name="content"]');
        
        // Get the content from Quill editor and assign it to the hidden input
        contentInput.value = quill.root.innerHTML; 
        
        // If content is empty, show an alert and prevent form submission
        if (plainText.trim() === "") {
        alert("Please enter content in the editor.");
        return false; // Prevent form submission
    }

        return true; // Proceed with form submission
    }
</script>
@endsection
