<?php

namespace App\Http\Controllers;

use App\Models\notes;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserPanelController extends Controller
{
    public function mynote(Request $request)
    {
        #$user=user::all();
        $noteQuery = Notes::where('is_archived', false) ->where('user_id', Auth::id())->orderBy('is_pinned', 'desc')
            ->where('user_id', Auth::id());
        $archivednotes = notes::where('is_archived', true)->where('user_id', Auth::id())->get();

        if ($request->has('search') && $request->search != '') {
            $noteQuery->where(function ($query) use ($request) {
                $query->where('title', 'like', '%' . $request->search . '%')
                    ->orWhere('content', 'like', '%' . $request->search . '%');
            });
        }

        $note = $noteQuery->get();

        return view('users.dashboard', compact('note', 'archivednotes'));
    }

    public function mynotecreate()

    {
        $users=User::where('id',Auth::id())->get();
        return view('users.mynotes',compact('users'));
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
    public function archiveindex()
    {
        $archivednotes = notes::where('is_archived', true)->get();
        return view('users.archives.index', compact('archivednotes'));
    }
    public function unarchive($id)
    {
        $note = Notes::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

        $note->update(['is_archived' => false]);

        return redirect()->route('users.dashboard')->with('success', 'Note unarchived successfully!');
    }
}
