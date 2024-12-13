@extends('layouts.app')
@section('content')
    <div class="container flex justify-center mb-2">
        <div class="max-w-md w-full bg-gray-600 p-4 rounded-lg shadow-lg">
            <h1 class="text-white text-2xl font-semibold">Edit</h1>
            <hr class="border-t-2 border-red-500 mt-2">
            <form action="{{route('admin.note.update',$notes->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="user_id" class="text-sm text-gray-500 dark:text-gray-400">User</label>
                    <select name="user_id" id="user_id" class="block w-full py-2 px-3 bg-gray-700 text-white rounded-lg" required>
                        <option value="">User</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}" {{ $notes->user_id == $user->id ? 'selected' : '' }}>
                                {{ $user->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('user_id')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                 <!-- Title Input -->
                 <div class="mb-4">
                    <label for="title" class="text-sm text-gray-500 dark:text-gray-400">Title</label>
                    <input type="text" name="title" id="title" class="block w-full py-2 px-3 bg-gray-700 text-white rounded-lg" 
                           value="{{ old('title', $notes->title) }}" placeholder="Enter note title" required>
                    @error('title')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Content Input -->
                <div class="mb-4">
                    <label for="content" class="text-sm text-gray-500 dark:text-gray-400">Content</label>
                    <textarea name="content" id="content" rows="4" class="block w-full py-2 px-3 bg-gray-700 text-white rounded-lg"
                              placeholder="Enter note content" required>{{ old('content', $notes->content) }}</textarea>
                    @error('content')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Optional Fields -->
                <div class="mb-4">
                    <label for="is_shared" class="flex items-center text-gray-500 dark:text-gray-400">
                        <input type="checkbox" name="is_shared" id="is_shared" value="1" class="mr-2" 
                            {{ old('is_shared', $notes->is_shared) ? 'checked' : '' }}> Shared
                    </label>
                    @error('is_shared')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="is_archived" class="flex items-center text-gray-500 dark:text-gray-400">
                        <input type="checkbox" name="is_archived" id="is_archived" value="1" class="mr-2" 
                            {{ old('is_archived', $notes->is_archived) ? 'checked' : '' }}> Archived
                    </label>
                    @error('is_archived')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="is_pinned" class="flex items-center text-gray-500 dark:text-gray-400">
                        <input type="checkbox" name="is_pinned" id="is_pinned" value="1" class="mr-2" 
                            {{ old('is_pinned', $notes->is_pinned) ? 'checked' : '' }}> Pinned
                    </label>
                    @error('is_pinned')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>

              

                <!-- Form Actions -->
                <div class="flex justify-center">                 
                    <input type="submit" class="bg-blue-600 text-white px-4 mx-2 py-2 rounded hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:hover:bg-blue-700 dark:focus:ring-blue-800 ">                 
                    <a href="{{ route('admin.note.index') }}" class="bg-red-600 text-white px-10 mx-2 py-2 rounded">Exit</a>
                </div>

            </form>
        </div>
    </div>
@endsection