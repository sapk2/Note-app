<?php

namespace App\Http\Controllers;

use App\Mail\ShareNoteMail;
use App\Models\Note_shared;
use App\Models\notes;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class shared_Notecontroller extends Controller
{
    public function index()
    {
        $user=User::all();

        $sharenote = notes::where('is_shared',1)->get();
        return view('admin.shared-notes.index', compact('sharenote','user'));
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'note_id' => 'required',
            'user_id' => 'required',
            'access_type' => 'required'
        ]);


        Note_shared::create($data);
        return redirect()->with('sucessfully');
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'acess_type' => 'required',
        ]);
        $sharenote = Note_shared::findorfail($id);
        $sharenote->update([
            'acess_type' => $request->acess_type,
        ]);
        return redirect()->back()->with('success', 'Access type updated successfully.');
    }
    public  function delete($id)
    {
        $sharenote = Note_shared::findorfail($id);
        $sharenote->delete();
        return redirect()->back()->with('success', 'Note unshared successfully.');
    }
    public function share(Request $request){
        $data = $request->validate([
            'note_id' => 'required',
            'user_id' => 'required',
            'access_type' => 'required'
        ]);
        $share=new Note_shared();
        $share->note_id = $request->note_id;
        $share->user_id = $request->user_id;
        $share->access_type = $request->access_type;
        $share->save();
        //send mail to user
        $note = notes::find($request->note_id);
        Mail::to($request->email)->send(new ShareNoteMail($note->title, $request->access_type));
        return redirect()->back()->with('success', 'Note shared and email sent successfully.');
        
    }
    
}
