<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function lockUser($id)
    {
        $user = User::findOrFail($id);
        $user->is_locked = true;
        $user->save();

        return redirect()->back()->with('success', 'User locked successfully.');
    }

    public function unlockUser($id)
    {
        $user = User::findOrFail($id);
        $user->is_locked = false;
        $user->save();

        return redirect()->back()->with('success', 'User unlocked successfully.');
    }
}
