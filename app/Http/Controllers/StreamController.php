<?php

namespace App\Http\Controllers;

use App\Activity;
use Illuminate\Http\Request;

class StreamController extends Controller
{
    public function index()
    {
        $stream = Activity::latest()
            ->paginate(config('pagination.stream-index'));

        return view('stream.index', compact('stream'));
    }

}
