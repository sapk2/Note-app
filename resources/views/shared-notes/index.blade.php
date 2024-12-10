@extends('layouts.app')
@section('content')
 <style>
    .switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

/* Hide default HTML checkbox */
.switch input {
  opacity: 0;
  width: 0;
  height: 0;
}

/* The slider */
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
 </style>
<div class="container flex mb-3">
    <div class="w-full sm:w-full bg-gray-600 p-4 rounded-lg shadow-lg">
        <h1 class="text-white text-2xl font-semibold">shared Notes</h1>
        <hr class="border-t-3 border-red-500 mt-2">
        <div class="my-5 text-right px-2">
            <div class="w-full text-white bg-gray-400 mt-4 ml-2 rounded-xl shadow-md">
                <table class="display table-auto w-full" id="sharable">
                    <thead>
                        <tr class="text-center">
                            <th class="border border-gray-600 p-2 bg-gray">SN</th>
                            <th class="border border-gray-600 p-2 bg-gray">Note Title</th>
                            <th class="border border-gray-600 p-2 bg-gray">user name</th>
                            <th class="border border-gray-600 p-2 bg-gray">Acess</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sharenote as $item)
                            <tr class="text-center">
                                <th class="border border-gray-500 p-2">{{$loop->index+1}}</th>
                                <th class="border border-gray-500 p-2">{{$item->title}}</th>
                                <th class="border border-gray-500 p-2">{{$item->user->name}}</th>
                                <th><label class="switch"><input type="checkbox"><span class="slider"></span></label> </th>
                            </tr>
                            
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
</div>
    
@endsection