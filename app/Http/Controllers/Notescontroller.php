<?php

namespace App\Http\Controllers;

use App\Models\Notes;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotesController extends Controller
{
    public function index()
    {
        // Fetch notes that are not archived
        $notes = Notes::where('is_archived', false)
                      ->where('user_id', Auth::id())
                      ->orderBy('is_pinned', 'desc')
                      ->get();
        
        // Fetch archived notes
        $archivednotes = Notes::where('is_archived', true)
                              ->where('user_id', Auth::id())
                              ->get();

        return view('admin.note.index', compact('notes', 'archivednotes'));
    }

    public function toggleArchive($id)
    {
        $notes = Notes::findOrFail($id);
        $notes->is_archived = !$notes->is_archived; // Toggle the archive status
        $notes->save();

        $message = $notes->is_archived 
            ? 'Note archived successfully!' 
            : 'Note unarchived successfully!';
        
        return redirect()->route('admin.note.index')->with('success', $message);
    }

    public function create()
    {
        $users = User::all();
        return view('admin.note.create', compact('users'));
    }

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

        Notes::create($data);
        return redirect()->route('admin.note.index')->with('success', 'Note created successfully!');
    }

    public function edit(string $id)
    {
        $users = User::all();
        $notes = Notes::findOrFail($id);
        return view('admin.note.edit', compact('notes', 'users'));
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

        $notes = Notes::findOrFail($id);
        $notes->update($data);

        return redirect()->route('admin.note.index')->with('success', 'Note updated successfully!');
    }

    public function delete(string $id)
    {
        $note = Notes::find($id);
        if (!$note) {
            return redirect()->route('admin.note.index')->with('error', 'Note not found!');
        }

        $note->delete();
        return redirect()->route('admin.note.index')->with('success', 'Note deleted successfully!');
    }
}
