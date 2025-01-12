@extends('layouts.app')
@section('content')
<div class="container flex mb-3">
    <div class="w-full sm:w-full bg-gray-600 p-4 rounded-lg shadow-lg">
        <h1 class="text-white text-2xl font-semibold">Users</h1>
        <hr class="border-t-3 border-red-500 mt-2">
        <div class="my-5 text-right px-2">
            <div class="w-full text-white bg-gray-400 mt-4 ml-2 rounded-xl shadow-md">
                <table class="display table-auto w-full" id="userid">
                    <thead>
                        <tr class="text-center">
                            <th class="border border-gray-600 p-2 bg-gray-800">SN</th>
                            <th class="border border-gray-600 p-2 bg-gray-800">Name</th>
                            <th class="border border-gray-600 p-2 bg-gray-800">Email</th>
                            <th class="border border-gray-600 p-2 bg-gray-800">Roles</th>
                            <th class="border border-gray-600 p-2 bg-gray-800">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $user)
                        <tr class="text-center">
                            <td class="border border-gray-600 p-2">{{$loop->index+1}}</td>
                            <td class="border border-gray-600 p-2">{{$user->name}}</td>
                            <td class="border border-gray-600 p-2">{{$user->email}}</td>
                            <td class="border border-gray-600 p-2"> {{$user->role ?? 'user'}} </td>
                            <td class="border border-gray-600 p-2">
                                <a href="{{route('admin.users.edit',$user->id)}}" class="bg-green-500 text-white px-4 py-2 rounded-lg">Edit</a>
                                <a href="{{route('admin.users.delete',$user->id)}}" onclick="return confirm('Are you sure to Delete?')" class="bg-red-600 text-white px-4 py-2 rounded-lg">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    let table = new DataTable('#userid');
</script>
@endsection
