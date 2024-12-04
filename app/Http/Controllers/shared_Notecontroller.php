<?php

namespace App\Http\Controllers;

use App\Models\Note_shared;
use Illuminate\Http\Request;

class shared_Notecontroller extends Controller
{
    public function index(){
        $sharenote=Note_shared::all();
        return view('sharenote.index',compact('sharenote'));
    }
    public function store(Request $request){
        $data=$request->validate([
            'note_id'=>'required',
            'user_id'=>'required',
            'access_type'=>'required'
        ]);


        $data=Note_shared::create([
            'note_id'=>$data['note_id'],
            'user_id'=>$data['user_id'],
            'access_type'=>$data['acess_type']
        ]);
        return redirect()->with('sucessfully');

    }
    public function update(Request $request,$id){
        $request->validate([
            'acess_type'=>'required',
        ]);
        $sharenote=Note_shared::findorfail($id);
        $sharenote->update([
            'acess_type'=>$request->acess_type,
        ]);
        return redirect()->back()->with('success', 'Access type updated successfully.');
    }
    public  function delete($id){
        $sharenote=Note_shared::findorfail($id);
        $sharenote->delete();
        return redirect()->back()->with('success', 'Note unshared successfully.');

    }
    
}
