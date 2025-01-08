<?php

namespace App\Http\Controllers;

use App\Models\Note_shared;
use App\Models\notes;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class dashboardcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function dashboard()
    {
        $totalnotes = notes::count();
        $totalusers = User::count();
        $totalshare = Note_shared::count();

        return view('admin.dashboard', compact('totalnotes', 'totalusers', 'totalshare'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function userdashboard()
    {
        
        
        return view('users.dashboard', compact('totalnotes', 'totalshare', 'totalarchives'));
    }
    

   
}
