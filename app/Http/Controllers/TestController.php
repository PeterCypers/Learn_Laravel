<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class TestController extends Controller
{
    function test($test) {
        // dd($test);
        dump($test);

        // $user = User::find(1);
        // $user = User::where('email', 't.degroote@webrand.be')->whereNotNull('birthdate')->orderBy('name')->get();
        // $user = User::count();

        return view('test', ['test' => $test]);
    }
}
