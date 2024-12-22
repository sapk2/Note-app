<?php

namespace App\Http\Controllers;

use App\Models\notes;
use Illuminate\Http\Request;

class archivecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function archivedNotes()
    {
        $archivednotes=notes::where('is_archived',true)->get();
        return view('admin.archives.archived',compact('archivednotes'));
    }


    public function togglearchive(string $id)
    {
        $archivednotes =notes::findorfail($id);
        $archivednotes->is_archived = !$archivednotes->is_archived;
        $archivednotes->save();
        return redirect()->route('admin.note.index')->with('sucess','note archive status update');
    }

}
