<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class Notescontroller extends Controller
{
   public function index(){
    $notes=Note::all();
    return view('note.index',compact('notes'));
   }
   public function create(){
    return view('note.create');
   }
   public function store(Request $request){
    $data=$request->validate([
        'user_id'=>'required',
        'text'=>'required',
        'content'=>'required',
        'is_shared'=>'required',
        'is_archived'=>'required',
        'is_pinned'=>'required',
        'is_viewed'=>'required'
    ]);
    $data =Note::create([
        'user_id'=>$data['user_id'],
        'text'=>$data['text'],
        'content'=>$data['content'],
        'is_shared'=>$data['is_shared'],
        'is_archived'=>$data['is_archived'],
        'is_pinned'=>$data['is_pinned'],
        'is_viewed'=>$data['is_viewed'],

    ]);
    return redirect()->with('sucessfully created!!');
   }
   public function edit(Request $request ,$id){
    $notes= Note::findorfail($id);
    return view('note.edit',compact('notes'));
   }
   public function update(Request $request, $id){
    $data=$request->validate([
        'user_id'=>'required',
        'title'=>'required',
        'content'=>'required',
        'is_shared'=>'required',
        'is_archived'=>'required',
        'is_pinned'=>'required',
        'is_viewed'=>'required'
    ]);
    $notes=Note::findorfail($id);
    $notes->update($data);
    return redirect()->with('sucess');

   }
   public function delete($id){
    $notes=Note::find($id);
    $notes->delete();
    return redirect()->with('success', 'Note successfully deleted!');
   }
}

