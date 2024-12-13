<?php

namespace App\Http\Controllers;

use App\Models\notes;
use App\Models\User;
use Illuminate\Http\Request;

class notescontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notes = notes::all();
        return view('admin.note.index', compact('notes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        $notes= notes::all();
         return view('admin.note.create', compact('users','notes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required',
            'title' => 'required',
            'content' => 'required',
            'is_shared' => 'boolean',
            'is_archived' => 'boolean',
            'is_pinned' => 'boolean',
        ]);
        $data = notes::create($data);
        return redirect()->route('admin.note.index')->with('sucessfully created!!');
    }

    
    public function edit(string $id)
    {
        $users=User::all();
        $notes = notes::findorfail($id);
        return view('admin.note.edit', compact('notes','users'));
    }

  
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'user_id' => 'required',
            'title' => 'required',
            'content' => 'required',
            'is_shared' => 'boolean',
            'is_archived' => 'boolean',
            'is_pinned' => 'boolean',
            
        ]);
       
        
        $notes = notes::findorfail($id);
        $notes->update($data);

        return redirect()->route('admin.note.index')->with('sucess');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)

    {
        $notes = notes::find($id);
        if (!$notes) {
            // If not found, redirect with an error message
            return redirect()->route('admin.note.index')->with('error', 'Note not found!');
        }
        $notes->delete();
        return redirect()->route('admin.note.index')->with('success', 'Note successfully deleted!');
    }
}
