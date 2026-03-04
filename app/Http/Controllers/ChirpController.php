<?php

namespace App\Http\Controllers;

use App\Models\Chirp;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class ChirpController extends Controller
{
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
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
            'message' => 'required|string|max:255|min:5',
        ], [
            'message.required' => 'Please write something to chirp!',
            'message.max' => 'Chirps must be 255 characters or less.',
        ]);

        // Chirp::create([
        //     'message' => $validated['message'],
        //     'user_id' => null,
        // ]);

        // this works, even tho there is a compiler error for user()
        auth()->user()->chirps()->create($validated);

        return redirect('/')->with('success', 'Your chirp has been posted!');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
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
    public function edit(Chirp $chirp)
    {
        $this->authorize('update', $chirp);

        return view('chirps.edit', compact('chirp'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Chirp $chirp)
    {
        $this->authorize('update', $chirp);

        $validated = $request->validate([
            'message' => 'required|string|max:255|min:5',
        ], [
            'message.required' => 'Please write something to chirp!',
            'message.max' => 'Chirps must be 255 characters or less.',
        ]);

        $chirp->update($validated);

        return redirect('/')->with('success', 'Your chirp has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chirp $chirp)
    {
        //$this->authorize('delete', $chirp);
        $this->authorize('update', $chirp);

        $chirp->delete();

        return redirect('/')->with('success', 'Your chirp has been deleted!');
    }
}
