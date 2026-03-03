<?php

namespace App\Http\Controllers;

use App\Models\Chirp;
use Illuminate\Http\Request;

class ChirpController extends Controller
{
    public function index()
    {
        // hardcoded
        // $chirps = [
        //     [
        //         'author' => 'Jane Doe',
        //         'message' => 'Just deployed my first Laravel app! 🚀',
        //         'time' => '5 minutes ago'
        //     ],
        //     [
        //         'author' => 'John Smith',
        //         'message' => 'Laravel makes web development fun again!',
        //         'time' => '1 hour ago'
        //     ],
        //     [
        //         'author' => 'Alice Johnson',
        //         'message' => 'Working on something cool with Chirper...',
        //         'time' => '3 hours ago'
        //     ]
        // ];

        // chirps from DB -> App\Models\Chirp
        $chirps = Chirp::with('user') // eager load user and prevents n+1 queries
        ->latest()
        ->take(50) //the latest 50
        ->get();
        return view('home', ['chirps' => $chirps]);
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'message' => 'required|string|max:255',
        ], [
            'message.required' => 'Please write something to chirp!',
            'message.max' => 'Chirps must be 255 characters or less.',
        ]);

        Chirp::create([
            'message' => $validated['message'],
            'user_id' => null,
        ]);

        return redirect('/')->with('success', 'Your chirp has been posted!');
    }
}
