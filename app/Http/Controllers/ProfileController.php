<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $success = session()->get('success') ?? null;

        return view('protected.profile')->with('success', $success);
    }
}
