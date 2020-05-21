<?php

namespace App\Http\Controllers;

use App\Activity;
use Illuminate\Http\Request;

class StreamController extends Controller
{
    public function index()
    {
        $stream = Activity::all();

        return view('stream.index', compact('stream'));
    }

}
