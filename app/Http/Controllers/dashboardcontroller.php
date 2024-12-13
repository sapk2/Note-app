<?php

namespace App\Http\Controllers;

use App\Models\Note_shared;
use App\Models\notes;
use App\Models\User;
use Illuminate\Http\Request;

class dashboardcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function dashboard()
    {
        $totalnotes= notes::count();
        $totalusers=User::count();
        $totalshare= Note_shared::count();

        return view('admin.dashboard', compact('totalnotes', 'totalusers','totalshare'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function userdashboard()
    {
        return view('users.dashboard');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
