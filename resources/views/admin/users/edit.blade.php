@extends('layouts.app')
@section('content')
    <div class="container flex max-w-4xl mx-auto mb-3">
        <div class="w-11/12 sm:w-md bg-gray-600 p-4 rounded-lg shadow-lg">
            <h1 class="text-white text-2xl font-semibold">Edit-user</h1>
            <hr class="border-t-3 border-red-500 mt-2">
            <div class="my-5   text-left px-2">
                <div class=" mb-4">
                    <form action="{{route('admin.users.update',$user->id)}}" method="Post" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="mb-5">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your Name</label>
                            <input type="text" id="name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{old('name',$user->name)}}"  />
                            @error('name')
                                <div class="text-red-600 -mt-5">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-5">
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your Email</label>
                            <input type="email" id="email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{old('name',$user->email)}}"  />
                            @error('email')
                                <div class="text-red-600 -mt-5">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-5">
                            <label for="role" class="block text-md font-medium text-white">Your Role</label>
                            <div class="mt-2">
                                <label>
                                    <input type="radio" name="role" value="admin" {{ old('role', $user->role) === 'admin' ? 'checked' : '' }}>
                                    <span class="ml-2 text-white">Admin</span>
                                </label>
                            </div>
                            <div class="mt-2">
                                <label>
                                    <input type="radio" name="role" value="user" {{ old('role', $user->role) === 'user' ? 'checked' : '' }}>
                                    <span class="ml-2 text-white">User</span>
                                </label>
                            </div>
                            <div class="mt-2">
                                <label>
                                    <input type="radio" name="role" value="guest" {{ old('role', $user->role) === 'guest' ? 'checked' : '' }}>
                                    <span class="ml-2 text-white">Guest</span>
                                </label>
                            </div>
                        </div>
                        
                       
                        <div class="flex justify-center">
                            <input type="submit" class="bg-blue-600 text-white px-4 mx-2 py-2 rounded">
                            <a href="{{ route('admin.users.index') }}" class="bg-red-600 text-white px-10 mx-2 py-2 rounded">Exit</a>
                        </div>

                    </form>

                  </div>
                </form>
            </div>
        </div>
    </div>
@endsection