<?php

namespace App\Http\Controllers;

use App\Models\notes;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserPanelController extends Controller
{
    public function mynote()
    {
        #$note=notes::all();
        $note = Notes::orderBy('is_pinned', 'desc')->where('user_id', Auth::id())->get();

        return view('users.dashboard', compact('note'));
    }

    public function mynotecreate()
    {
        return view('users.mynotes');
    }

    public function mystore(Request $request)
    {

        $data = $request->validate([

            'title' => 'required',
            'content' => 'required',
            'is_shared' => 'boolean',
            'is_archived' => 'boolean',
            'is_pinned' => 'boolean',
        ]);
        $data['content'] = strip_tags($request->input('content'));
        $data['user_id'] = Auth::id();
        Notes::create($data);

        return redirect()->route('users.dashboard')->with('success', 'Note created successfully!');
    }
    public function noteshow($id)
    {
        $note = Notes::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

        return view('users.noteshow', compact('note'));
    }
    public function mynoteedit($id)
    {
        $note = Notes::findOrFail($id);

        return view('users.noteedit', compact('note'));
    }

    public function mynoteupdate(Request $request, $id)
    {
        $note = Notes::findOrFail($id);

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'is_shared' => 'boolean',
            'is_archived' => 'boolean',
            'is_pinned' => 'boolean',
        ]);
        $data['content'] = strip_tags($request->input('content'));
        $note->update($data);

        return redirect()->route('users.dashboard')->with('success', 'Note updated successfully!');
    }

    public function mynotedelete($id)
    {
        $note = Notes::findOrFail($id);
        $note->delete();

        return redirect()->route('users.dashboard')->with('success', 'Note deleted successfully!');
    }
}
